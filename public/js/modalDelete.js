document.addEventListener("DOMContentLoaded", function() {
    // Находим все ссылки для удаления
    var deleteLinks = document.querySelectorAll('.delete-link');

    deleteLinks.forEach(function(link) {
      link.addEventListener('click', function(event) {
        event.preventDefault(); // Отменяем стандартное поведение перехода по ссылке
        // Обработчик клика по кнопке подтверждения
        let deleteForm = link.querySelector('form');
        console.log(deleteForm);
        document.getElementById('confirm-delete').addEventListener('click', function() {
          deleteForm.submit();
        });
      });
    });
});