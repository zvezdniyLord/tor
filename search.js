function search() {
    // Получаем значение из инпута
    var searchText = document.getElementById('searchInput').value.trim();

    // Получаем элемент, в котором будем искать
    var container = document.querySelector('.section__list'); // Можно заменить на другой элемент, если нужно искать только в определенной области страницы

    // Создаем регулярное выражение для поиска текста
    var regex = new RegExp(searchText, 'gi'); // 'gi' означает "глобальный поиск (global)" и "игнорирование регистра (case-insensitive)"

    // Находим все элементы, содержимое которых соответствует регулярному выражению
    var elements = container.querySelectorAll('*'); // Ищем во всех элементах

    // Получаем контейнер для результатов поиска
    var resultsContainer = document.getElementById('searchResults');

    // Очищаем результаты предыдущего поиска
    resultsContainer.innerHTML = '';

    // Проверяем, есть ли текст для поиска
    if (searchText !== '') {
        // Перебираем найденные элементы и отображаем их
        elements.forEach(function (element) {
            // Проверяем содержимое элемента
            if (element.innerText.match(regex)) {
                // Если содержимое соответствует регулярному выражению, добавляем элемент в результаты поиска
                var resultItem = document.createElement('div');
                resultItem.classList.add('searchdiv');
                resultItem.textContent = element.innerText;
                resultsContainer.appendChild(resultItem);
            }
        });

        // Показываем контейнер с результатами поиска
        document.getElementById('searchResultsContainer').style.display = 'block';
    } else {
        // Скрываем контейнер с результатами поиска, если инпут пустой
        document.getElementById('searchResultsContainer').style.display = 'none';
    }
}