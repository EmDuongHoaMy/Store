function selectSize(element) {
    const buttons = document.querySelectorAll('.size-button');
    buttons.forEach(button => button.classList.remove('selected'));
    element.classList.add('selected');
}