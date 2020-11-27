<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GrupoCliente;
use App\Models\GrupoProduto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail as FacadesMail;

class HomeController extends Controller
{

    private $grupocliente;
    private $grupoproduto;

    public function __construct()
    {
        $this->grupocliente = new GrupoCliente();
        $this->grupoproduto = new GrupoProduto();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = DB::table('users')->where('cargo_id', 3)->get();
        $gerentes = DB::table('users')->where('cargo_id', 2)->get();
        $grupoclientes = $this->grupocliente::all()->sortBy('descricao');
        $grupoprodutos = $this->grupoproduto::all()->sortBy('descricao');
        $safras = DB::table('safras')->orderBy('descricao', 'desc')->get();
        //dd($grupoclientes);

        $id_gerente = null;
        $id_consultor = null;
        $id_grupocliente = null;
        $id_safra = 2;
        $safra = DB::select('SELECT *
                            FROM safras
                            WHERE id = ?', [$id_safra])[0];

        $wheresgeneric = "";
        $wheres = " ( s.id IS NULL OR s.id = $id_safra) ";
        $wheres2 = " (o.data IS NULL OR (o.data >= '$safra->dataInicio' AND o.data <= '$safra->dataFim')) ";
        $wheres3 = " (m.dataPrevista IS NULL OR (m.dataPrevista >= '$safra->dataInicio' AND m.dataPrevista <= '$safra->dataFim')) ";

        if ($id_gerente != null) {
            $wheresgeneric .= " AND u.gerente_id = $id_gerente";
        }

        if ($id_consultor != null) {
            $wheresgeneric .= " AND u.id  = $id_consultor";
        }

        if ($id_grupocliente != null) {
            $wheresgeneric .= " AND gc.id  = $id_grupocliente";
        }

        // Valores por Grupo de Cliente
        $grupoclientetotals = DB::select('
            WITH 
                g_clientes AS (
                    SELECT gc.id, gc.descricao, gc.user_id
                    FROM grupo_clientes gc INNER JOIN users u ON u.id = gc.user_id
                    WHERE 1 = 1 ' . $wheresgeneric . '
                ),

                potencialDeAcesso AS (
                    SELECT gc.id, gc.descricao, COALESCE(SUM(sc.qtdUnidadesArea * pdn.valorUnitario), 0) AS potencialDeAcesso
                    FROM g_clientes gc LEFT JOIN (
                                SELECT sc.id, a.grupoCliente_id AS areaId, sum(a.qtdUnidadesArea) AS qtdUnidadesArea
                                FROM segmento_culturas sc INNER JOIN area_grupo_clientes a ON sc.id = a.segmentoCultura_id
                                group by 1, 2
                                ) AS sc ON sc.areaId = gc.id
                    LEFT JOIN (
                                SELECT pdn.segmentoCultura_id, pdn.safra_id, sum(pdn.valorUnitario) AS valorUnitario
                                FROM   programa_de_negocios pdn
                                group by 1, 2
                                ) AS pdn ON pdn.segmentoCultura_id = sc.id
                    LEFT JOIN safras s ON s.id = pdn.safra_id
                    WHERE ' . $wheres . ' 
                    GROUP BY 1, 2
                ),

                venda AS (
                    SELECT gc.id, gc.descricao, COALESCE(SUM(o.qtdUnidadesProduto * o.valorUnitario), 0) AS venda
                    FROM g_clientes gc LEFT JOIN inscricao_estaduals ie ON ie.grupoCliente_id = gc.id
                    LEFT JOIN operacaos o ON ie.id = o.inscricaoEstadual_id 
                    WHERE ' . $wheres2 . ' 
                    GROUP BY 1, 2
                ),

                meta AS (
                    SELECT gc.id, gc.descricao, COALESCE(SUM(m.metaDesejada), 0) AS meta
                    FROM g_clientes gc LEFT JOIN metas m ON m.grupoCliente_id = gc.id
                    WHERE ' . $wheres3 . ' 
                    GROUP BY 1, 2
                )

                SELECT pda.descricao, pda.potencialDeAcesso, m.meta, v.venda
                FROM potencialDeAcesso pda INNER JOIN meta m ON pda.id = m.id INNER JOIN venda v ON m.id = v.id
                ORDER BY 1
            ');
        //dd($grupoclientetotals);

        // Valores por Grupo de Produto
        $grupoprodutototals = DB::select('
            WITH 
                g_produtos AS (
                    SELECT gp.id, gp.descricao, gc.user_id
                    FROM grupo_produtos gp LEFT JOIN programa_de_negocios pdn ON pdn.grupoProduto_id = gp.id
                    LEFT JOIN metas m ON m.programaDeNegocio_id = pdn.id
                    LEFT JOIN grupo_clientes gc ON gc.id = m.grupoCliente_id
                    LEFT JOIN users u ON u.id = gc.user_id
                    WHERE 1 = 1
                ),

                potencialDeAcesso AS (
                    SELECT gp.id, gp.descricao, COALESCE(SUM(agc.qtdUnidadesArea * sc.valorUnitario), 0) AS potencialDeAcesso
                    FROM g_produtos gp LEFT JOIN (
                        SELECT sc.id, pdn.grupoProduto_id AS valorId, pdn.safra_id, SUM(pdn.valorUnitario) AS valorUnitario
                        FROM segmento_culturas sc INNER JOIN programa_de_negocios pdn ON sc.id = pdn.segmentoCultura_id
                        GROUP BY 1, 2, 3
                        ) AS sc ON sc.valorId = gp.id
                    LEFT JOIN (
                         SELECT agc.segmentoCultura_id, SUM(agc.qtdUnidadesArea) AS qtdUnidadesArea
                         FROM   area_grupo_clientes agc
                         group by 1
                        ) AS agc ON agc.segmentoCultura_id = sc.id
                    

                        
                    GROUP BY 1, 2
                ),

                venda AS (
                    SELECT gp.id, gp.descricao, COALESCE(SUM(o.qtdUnidadesProduto * o.valorUnitario), 0) AS venda
                    FROM grupo_produtos gp LEFT JOIN produtos p ON p.grupoProduto_id = gp.id
                    LEFT JOIN operacaos o ON p.id = o.produto_id 



                    GROUP BY 1, 2
                ),

                meta AS (
                    SELECT gp.id, gp.descricao, COALESCE(SUM(m.metaDesejada), 0) AS meta
                    FROM grupo_produtos gp LEFT JOIN programa_de_negocios pdn ON pdn.grupoProduto_id = gp.id
                    LEFT JOIN metas m ON m.programaDeNegocio_id = pdn.id
                    
                    

                    GROUP BY 1, 2
                )

                SELECT pda.descricao, pda.potencialDeAcesso, m.meta, v.venda
                FROM potencialDeAcesso pda INNER JOIN meta m ON pda.id = m.id INNER JOIN venda v ON m.id = v.id
                ORDER BY 1
            ');
        //dd($grupoprodutototals);        

        $wheres .= $wheresgeneric;
        $wheres2 .= $wheresgeneric;
        $wheres3 .= $wheresgeneric;

        // Total de Potencial de Acesso
        $totalpotencialacesso = DB::select('SELECT COALESCE(SUM(sc.qtdUnidadesArea * pdn.valorUnitario), 0) AS potencialDeAcesso
                FROM grupo_clientes gc LEFT JOIN (
                                SELECT sc.id, a.grupoCliente_id AS areaId, SUM(a.qtdUnidadesArea) AS qtdUnidadesArea
                                FROM segmento_culturas sc INNER JOIN area_grupo_clientes a ON sc.id = a.segmentoCultura_id
                                group by 1, 2
                            ) AS sc ON sc.areaId = gc.id
                LEFT JOIN (
                                SELECT pdn.segmentoCultura_id, pdn.safra_id, SUM(pdn.valorUnitario) AS valorUnitario
                                FROM   programa_de_negocios pdn
                                group by 1, 2
                            ) AS pdn ON pdn.segmentoCultura_id = sc.id
                LEFT JOIN safras s ON s.id = pdn.safra_id
                INNER JOIN users u ON u.id = gc.user_id
                WHERE ' . $wheres)[0];

        //Total de venda
        $totalvenda = DB::select('SELECT COALESCE(SUM(o.qtdUnidadesProduto * o.valorUnitario), 0) AS Total
                FROM grupo_clientes gc INNER JOIN inscricao_estaduals ie ON ie.grupoCliente_id = gc.id
                LEFT JOIN operacaos o ON ie.id = o.inscricaoEstadual_id
                INNER JOIN users u ON u.id = gc.user_id
                WHERE ' . $wheres2 . '')[0];
        //dd($totalvenda);

        //Total de Meta
        $totalmeta = DB::select('SELECT COALESCE(SUM(m.metaDesejada), 0) AS Total
                FROM grupo_clientes gc LEFT JOIN metas m ON m.grupoCliente_id = gc.id
                INNER JOIN users u ON u.id = gc.user_id
                WHERE ' . $wheres3 . '')[0];
        //dd($totalmeta);

        return view('home')
            ->with('users', $users)
            ->with('gerentes', $gerentes)
            ->with('grupoclientes', $grupoclientes)
            ->with('grupoprodutos', $grupoprodutos)
            ->with('safras', $safras)
            ->with('totalpotencialacesso', $totalpotencialacesso)
            ->with('totalvenda', $totalvenda)
            ->with('grupoclientetotals', $grupoclientetotals)
            ->with('totalmeta', $totalmeta)
            ->with('grupoprodutototals', $grupoprodutototals);
    }

    /**
     * Login page redirect
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Forgot password page redirect
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function forgot_password()
    {
        return view('forgot-password');
    }

    /**
     * Password page redirect
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        //dd($user);

        if ($user == null) {
            return redirect()->back()->with(['error' => 'Email não cadastrado!']);
        }

        /*$user = Sentinel::findById($user->id);
        $reminder = Reminder::exists($user) ? : Reminder::create($user);
        $this->sendEmail($user, $reminder->code);*/

        return redirect()->back()->with(['success' => 'Chave de recuperação enviada com sucesso! Verifique seu e-mail']);
    }

    /**
     * Email send
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendEmail($user, $code)
    {
        /*Mail::send(
            'email.forgot',
            ['user' => $user, 'code' => $code],
            function($message) use ($user) {
                $message->to($user->email);
                $message->subject("Olá $user->nickname, redefina sua senha.");
            }
        );*/
    }


    /**
     * Login page redirect
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function checklogin(Request $request)
    {
        $this->validate($request, [
            'inputEmail' => 'required|email',
            'inputPassword' => 'required|min:5'
        ]);

        $dados = $request->all();

        if (Auth::attempt(['email' => $dados['inputEmail'], 'password' => $dados['inputPassword']])) {
            return redirect()->route('home');
        } else {
            return redirect('login')->with('error', 'Login não permitido! Verifique e-mail ou senha!');
            //return redirect('login');
        }
    }

    /**
     * Login page redirect
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
