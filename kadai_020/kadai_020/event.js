const text = document.getElementById('text');
const button = document.getElementById('btn');
console.log(button)
button.addEventListener('click', () => {
    console.log('クリックされました！')
    text.textContent = 'ボタンをクリックしました'
});

