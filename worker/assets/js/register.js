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

Citizens.forEach(citizens => {
    const tr = document.createElement('tr');
    const trContent = `
        <td></td>
        <td>${citizens.userID}</td>
        <td>${citizens.passwword}</td>
        <td>${citizens.firstName}</td>
        <td>${citizens.middleName}</td>
        <td>${citizens.lastName}</td>
        <td>${citizens.birthdate}</td>
        <td>${citizens.address}</td>
        <td>${citizens.contactNumber}</td>
        <td><a href="#"><i class="las la-edit"></i></a><a href="#"><i class="las la-trash"></a></i></td>
    `;
    tr.innerHTML = trContent;
    document.querySelector('table tbody').appendChild(tr);
});
