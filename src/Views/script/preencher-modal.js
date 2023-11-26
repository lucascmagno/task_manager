$('#Editar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Botão que acionou o modal
    var materiaId = button.data('id'); // Extrai o ID da matéria do atributo data-id

    // Faz a solicitação AJAX para obter os detalhes da matéria com base no ID
    $.ajax({
        url: '../php/listaMateria.php',
        type: 'GET',
        data: { id: materiaId },
        dataType: 'json',
        success: function(data) {
            // Preenche os campos do formulário no modal com os dados recebidos
            $('#materiaNome').val(data.nome_materia);
            $('#materiaId').val(data.idmateria);
        },
        error: function(xhr, status, error) {
            console.error('Erro ao obter dados da matéria:', status, error);
            // Adicione aqui a lógica para lidar com erros, se necessário
        }
    });
});
