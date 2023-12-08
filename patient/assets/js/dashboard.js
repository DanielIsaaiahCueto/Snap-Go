const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');

const darkMode = document.querySelector('.dark-mode');
let getMode = localStorage.getItem("mode");

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

if(getMode && getMode === "dark"){
    document.body.classList.add('dark-mode-variables');
    darkMode.querySelector('span:nth-child(2)').classList.add('active');
    darkMode.querySelector('span:nth-child(1)').classList.remove('active');
}else{
    darkMode.querySelector('span:nth-child(2)').classList.remove('active');
    darkMode.querySelector('span:nth-child(1)').classList.add('active');
}

darkMode.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode-variables');

    if(!document.body.classList.contains("dark-mode-variables")){
        darkMode.querySelector('span:nth-child(1)').classList.add('active');
        darkMode.querySelector('span:nth-child(2)').classList.remove('active');
        return localStorage.setItem('mode', 'light');
    }
    
    darkMode.querySelector('span:nth-child(1)').classList.remove('active');
    darkMode.querySelector('span:nth-child(2)').classList.add('active');
    localStorage.setItem('mode', 'dark');
})


