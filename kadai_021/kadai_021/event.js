const text = document.getElementById('text');
const button = document.getElementById('btn');
console.log(button)
button.addEventListener('click', () => {
    setTimeout(() => {
    text.textContent = 'ボタンをクリックしました'
    }, 2000);
});

