//All Views
const views = document.querySelectorAll('main')
// Current View
if(localStorage.getItem('currentView') != null){
    showView();
} else {
    localStorage.setItem('currentView', 0)
    showView();
}

 const btnLogout = document.querySelector('.btnLogout')
 const btnAdd = document.querySelector('.btnAdd')
 const btnBack = document.querySelectorAll('.btnBack')
// const btnShow = document.querySelectorAll('.btnShow')
// const btnEdit = document.querySelectorAll('.btnEdit')
// const btnCancel = document.querySelectorAll('.btnCancel')

// LoginForm (POST)
const loginForm = document.querySelector('#loginForm')
loginForm.addEventListener('submit', async function (e) {
    e.preventDefault()
    try {
        const email = document.getElementById('email').value
        const password = document.getElementById('password').value
        const response = await fetch('http://127.0.0.1:8000/api/login', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                email: email,
                password: password
            })
        })
        const data = await response.json()
        if (response.ok) {
            // console.log(data.message)
            Swal.fire({
                title: "Congrats!",
                text: data.message,
                icon: "success",
                showConfirmButton: false,
                timer: 1500
            });
            localStorage.setItem('authToken', data.token)
            localStorage.setItem('currentView', 1)
            showView();
        } else {
            // console.error(data.message)
            Swal.fire({
                title: "Watch out!",
                text: data.message,
                icon: "error",
                showConfirmButton: false,
                timer: 1500
            });
        }
    } catch (error) {
        console.error(error.message)
    }
})

// Buttons & Anchors

// btnLogin.addEventListener('click', () => {
//     currentView = 1
//     showView()
// })

btnLogout.addEventListener('click', () => {
    localStorage.removeItem('authToken')
    localStorage.setItem('currentView', 0)
    showView()
})
btnAdd.addEventListener('click', () => {
    localStorage.setItem('currentView', 2) 
    showView()
})

btnBack.forEach(element => {
    element.addEventListener('click', () => {
        localStorage.setItem('currentView', 1)
        showView()
    })
})
// btnShow.forEach(element => {
//     element.addEventListener('click', () => {
//         currentView = 3
//         showView()
//     })
// })
// btnCancel.forEach(element => {
//     element.addEventListener('click', () => {
//         currentView = 0
//         showView()
//     })
// })

function showView() {
    views.forEach(element => {
        element.classList.remove = ('animateView')
        element.style.display = 'none'

    });
    views[localStorage.getItem('currentView')].classList.add = ('animateView')
    views[localStorage.getItem('currentView')].style.display = 'block'
}