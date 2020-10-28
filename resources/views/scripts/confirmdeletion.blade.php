<script>
	function confirmDeletion(id, nome) {
        console.log(id);
        console.log(nome);
		Swal.fire({
			title: '{{ __('Deseja realmente excluir ') }}\n' + id + ' - ' + nome + '?',
			text: '{{ __('Esse ação não poderá ser desfeita!') }}',
			icon: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: '{{ __('Sim, prossiga!') }}',
			cancelButtonText: '{{ __('Agora não.') }}',
		}).then(function(result) {
			if (result.value) {
				$.get(`/${id}/destroy`, function(data) {
					if (data.status == 'success') {
						Swal.fire(
							'{{ __('Excluído!') }}',
							'{{ __('Exclusão realizada com sucesso.') }}',
							'success'
						).then(function(result) {
							window.location.reload();
						});
					} else if (data.status == 'errorQuery') {
						Swal.fire(
							'{{ __('Erro!') }}',
							'{{ __('Ocorreu um problema ao excluir o item solicitado. Entre em contato com o suporte! ERROR:001') }}',
							'error'
						);
					} else if (data.status == 'errorPDO') {
						Swal.fire(
							'{{ __('Erro!') }}',
							'{{ __('Ocorreu um problema ao excluir o item solicitado. Entre em contato com o suporte! ERRO:002') }}',
							'error'
						);
					} else {
						Swal.fire(
							'{{ __('Erro!') }}',
							'{{ __('Ocorreu um problema ao excluir o item solicitado. Entre em contato com o suporte!') }}',
							'error'
						);
					}
				});
			}
		});
	}
</script>
