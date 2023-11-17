const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');

const darkMode = document.querySelector('.dark-mode');

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

darkMode.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode-variables');
    darkMode.querySelector('span:nth-child(1)').classList.toggle('active');
    darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
})


Supplies.forEach(supplies => {
    const tr = document.createElement('tr');
    const trContent = `
        <td>${supplies.stockID}</td>
        <td>${supplies.productID}</td>
        <td>${supplies.productInfo}</td>
        <td>${suplies.type}</td>
        <td>${supplies.price}</td>
        <td>${supplies.expirationDate}</td>
        <td><a href="#"><i class="las la-edit"></i></a><i class="las la-trash"></i></td>
    `;
    tr.innerHTML = trContent;
    document.querySelector('table tbody').appendChild(tr);
});