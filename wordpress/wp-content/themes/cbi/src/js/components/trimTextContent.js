function trimTextContent(selector, maxLines) {
    const elements = document.querySelectorAll(selector);
    
    elements.forEach(element => {
        // Получаем высоту строки
        const lineHeight = parseInt(window.getComputedStyle(element).lineHeight);
        // Вычисляем максимально допустимую высоту
        const maxHeight = lineHeight * maxLines;
        
        // Создаем временный элемент для измерения высоты текста
        let tempDiv = document.createElement('div');
        tempDiv.style.visibility = 'hidden';
        tempDiv.style.position = 'absolute';
        tempDiv.style.width = element.offsetWidth + 'px';
        tempDiv.style.font = window.getComputedStyle(element).font;
        tempDiv.style.lineHeight = lineHeight + 'px';
        document.body.appendChild(tempDiv);
        
        // Разбиваем текст на слова
        const words = element.textContent.split(' ');
        let newText = '';
        let i = 0;
        
        // Добавляем слова по одному, пока не достигнем максимальной высоты
        while (i < words.length) {
            tempDiv.textContent = newText + words[i] + ' ';
            if (tempDiv.offsetHeight > maxHeight) {
            break;
            }
            newText += words[i] + ' ';
            i++;
        }
        
        // Устанавливаем обрезанный текст в элемент
        element.textContent = newText.trim() + '...';
        // Удаляем временный элемент
        document.body.removeChild(tempDiv);
    });
}

// Вызываем функцию после загрузки DOM
document.addEventListener('DOMContentLoaded', () => {
    trimTextContent('.desc', 35);
});