const darkMode = document.getElementById('dark-mode');
const lightMode = document.getElementById('light-mode');

darkMode.addEventListenet('click', () =>{
    document.body.classList.toggle('dark_mode')
    darkMode.classList.toggle('hide')
    lightMode.classList.remove('hide')
})
lightMode.addEventListenet('click', () =>{
    document.body.classList.remove('dark_mode')
    lightMode.classList.toggle('hide')
    darkMode.classList.remove('hide')
})