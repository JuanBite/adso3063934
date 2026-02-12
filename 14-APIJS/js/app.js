const views = document.querySelectorAll('main')
let currentView = 0

// Buttons & Anchors

const btnLogin = document.querySelector('.btnLogin')
btnLogin.addEventListener('click', () => {
    currentView = 1
    showView()
})

const btnAdd = document.querySelector('.btn-add')
btnAdd.addEventListener('click', () => {
    currentView = 2
    showView()
})

function showView(){
    views.forEach(element => {
        element.style.display = 'none'
    });
    views[currentView].style.display = 'block'
}

showView()