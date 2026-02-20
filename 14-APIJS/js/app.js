//All Views
const views = document.querySelectorAll('main')
// Current View
if (localStorage.getItem('currentView') != null) {
    showView();
} else {
    localStorage.setItem('currentView', 0)
    showView();
}

const btnLogout = document.querySelectorAll('.btnLogout')
const btnAdd = document.querySelector('.btnAdd')
const btnBack = document.querySelectorAll('.btnBack')
// const btnEdit = document.querySelectorAll('.btnEdit')
const btnCancel = document.querySelectorAll('.btnCancel')

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

const list = document.querySelector('.list')
async function listPets() {
    const token = localStorage.getItem("authToken")
    try {

        const response = await fetch('http://127.0.0.1:8000/api/pets/list', {
            method: 'GET',
            headers: {
                'Content-type': 'application/json',
                'Accept': 'application/json',
                "Authorization": `Bearer ${token}`
            },

        })
        const data = await response.json()

        if (response.ok) {
            list.innerHTML = "";

            data.pets.forEach(pet => {
                list.innerHTML += `

                <div class="row">
                    <img src="images/${pet.image}" alt="">
                    <div class="data">
                        <h3>${pet.name}</h3>
                    </div>
                    <nav class="actions">
                        <a href="javascript:;" class="btnShow" data-id="${pet.id}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                viewBox="0 0 256 256">
                                <path
                                    d="M247.31,124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57,61.26,162.88,48,128,48S61.43,61.26,36.34,86.35C17.51,105.18,9,124,8.69,124.76a8,8,0,0,0,0,6.5c.35.79,8.82,19.57,27.65,38.4C61.43,194.74,93.12,208,128,208s66.57-13.26,91.66-38.34c18.83-18.83,27.3-37.61,27.65-38.4A8,8,0,0,0,247.31,124.76ZM128,192c-30.78,0-57.67-11.19-79.93-33.25A133.47,133.47,0,0,1,25,128,133.33,133.33,0,0,1,48.07,97.25C70.33,75.19,97.22,64,128,64s57.67,11.19,79.93,33.25A133.46,133.46,0,0,1,231.05,128C223.84,141.46,192.43,192,128,192Zm0-112a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Z">
                                </path>
                            </svg>
                        </a>
                        <a href="javascript:;" class="btnEdit" data-id="${pet.id}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                viewBox="0 0 256 256">
                                <path
                                    d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z">
                                </path>
                            </svg>
                        </a>
                        <a href="javascript:;" class="btnDelete" data-id="${pet.id}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                viewBox="0 0 256 256">
                                <path
                                    d="M216,48H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM192,208H64V64H192ZM80,24a8,8,0,0,1,8-8h80a8,8,0,0,1,0,16H88A8,8,0,0,1,80,24Z">
                                </path>
                            </svg>
                        </a>
                    </nav>
                </div>
                `;
            })
        } else {
            Swal.fire({
                title: "Fail to load pets",
                text: data.message,
                icon: "error",
                showConfirmButton: false,
                timer: 1500
            });
        }
    } catch (error) {
        console.error(error.message)
    }
}
// View (Show Pet)
const petDetailContainer = document.querySelector(".pet-detail");

async function showPetDetail(id) {
    const token = localStorage.getItem("authToken");

    try {
        const response = await fetch(`http://127.0.0.1:8000/api/pets/show/${id}`, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "Authorization": `Bearer ${token}`
            }
        });

        const data = await response.json();

        if (response.ok) {
            const pet = data.pet; // Suponiendo que la API devuelve { "pet": {...} }

            petDetailContainer.innerHTML = `
                 <img src="images/${pet.image}" alt="">

            <div class="card-info">
                <div class="item"><span>Name:</span>${pet.name}</div>
                <div class="item"><span>Y/O:</span> ${pet.age}</div>
                <div class="item"><span>Breed:</span> ${pet.breed}</div>
                <div class="item"><span>Weight:</span> ${pet.weight}</div>
                <div class="item"><span>Location:</span> ${pet.location}</div>
                <div class="item"><span>Status:</span> ${pet.status}</div>
            </div>

            <button class="btnAdopt">Adopt</button>
            `;
        } else {

        }
    } catch (error) {
        console.error("Error al cargar detalle:", error);
    }
}

// View (Add Pet)
const btnSaveAdd = document.querySelector(".Add");
const addPetForm = document.querySelector("#Add form");
btnSaveAdd.addEventListener("click", async () => {
    const token = localStorage.getItem("authToken");

    // 1. Capturamos los datos del formulario
    const formData = new FormData(addPetForm);
    // Convertimos los datos a un objeto simple { name: "valor", kind: "valor"... }
    const dataToSend = Object.fromEntries(formData.entries());

    // Validación simple: verificar que el nombre no esté vacío
    if (!dataToSend.name) {
        Swal.fire("Error", "Please enter at least the pet's name", "error");
        return;
    }

    try {
        const response = await fetch("http://127.0.0.1:8000/api/pets/store", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "Authorization": `Bearer ${token}`
            },
            body: JSON.stringify(dataToSend)
        });

        const result = await response.json();

        console.log(dataToSend)
        if (response.ok) {
            Swal.fire({
                title: "Success!",
                text: "Pet added correctly",
                icon: "success",
                timer: 2000,
                showConfirmButton: false
            });

            addPetForm.reset(); // Limpia los campos del formulario
            localStorage.setItem('currentView', 1); // Indicamos que vamos a la lista
            showView(); // Cambiamos la vista
        } else {
            Swal.fire("Error", result.message || "Could not save the pet", "error");
        }
    } catch (error) {
        console.error("Connection error:", error);
        Swal.fire("Error", "Server connection failed", "error");
    }
});

// View (Edit Pet)
const btnSaveEdit = document.querySelector(".btnSaveEdit");
const editPetForm = document.querySelector("#Edit form");
async function loadPetDataToEdit(id) {
    const token = localStorage.getItem("authToken");
    try {
        const response = await fetch(`http://127.0.0.1:8000/api/pets/show/${id}`, {
            method: "GET",
            headers: {
                "Authorization": `Bearer ${token}`,
                "Accept": "application/json"
            }
        });
        const data = await response.json();
        if (response.ok) {
            const pet = data.pet;
            // Llenamos cada campo del formulario de edición
            editPetForm.name.value = pet.name;
            editPetForm.kind.value = pet.kind;
            editPetForm.weight.value = pet.weight;
            editPetForm.age.value = pet.age;
            editPetForm.breed.value = pet.breed;
            editPetForm.location.value = pet.location;
            editPetForm.description.value = pet.description;
        }
    } catch (error) {
        console.error("Error loading pet data:", error);
    }
}

btnSaveEdit.addEventListener("click", async () => {
    const token = localStorage.getItem("authToken");
    const id = localStorage.getItem("editPetId"); // Recuperamos el ID que guardamos antes

    const formData = new FormData(editPetForm);
    const dataToSend = Object.fromEntries(formData.entries());

    try {
        const response = await fetch(`http://127.0.0.1:8000/api/pets/edit/${id}`, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "Authorization": `Bearer ${token}`
            },
            body: JSON.stringify(dataToSend)
        });

        if (response.ok) {
            Swal.fire({
                title: "Updated!",
                text: "The pet information has been updated.",
                icon: "success",
                timer: 2000,
                showConfirmButton: false
            });

            localStorage.setItem('currentView', 1); // Regresamos a la lista
            showView();
        } else {
            const result = await response.json();
            Swal.fire("Error", result.message || "Update failed", "error");
        }
    } catch (error) {
        console.error("Connection error:", error);
        Swal.fire("Error", "Server connection failed", "error");
    }
});


async function deletePet(id) {
    const token = localStorage.getItem("authToken");

    // Preguntar al usuario antes de borrar
    const result = await Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    });

    if (result.isConfirmed) {
        try {
            const response = await fetch(`http://127.0.0.1:8000/api/pets/delete/${id}`, {
                method: "DELETE",
                headers: {
                    "Accept": "application/json",
                    "Authorization": `Bearer ${token}`
                }
            });

            if (response.ok) {
                Swal.fire("Deleted!", "The pet has been removed.", "success");
                listPets(); // Recargamos la lista para que desaparezca la fila
            } else {
                Swal.fire("Error", "the pet has a process of ADOPTION", "error");
            }
        } catch (error) {
            console.error("Connection error:", error);
            Swal.fire("Error", "Server connection failed", "error");
        }
    }
}

// Buttons & Anchors

btnLogout.forEach(btn => {
    btn.addEventListener('click', () => {
        localStorage.removeItem('authToken')
        localStorage.setItem('currentView', 0)
        showView()
    })
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

btnCancel.forEach(element => {
    element.addEventListener('click', () => {
        localStorage.setItem('currentView', 1)
        showView()
    })
})
if (list) {
    list.addEventListener('click', (e) => {
        const btnShow = e.target.closest(".btnShow");
        const btnEdit = e.target.closest(".btnEdit");
        const btnDelete = e.target.closest(".btnDelete");

        if (btnShow) {
            const id = btnShow.getAttribute("data-id");

            // 1. Cargamos los datos primero
            // Guardamos el id de la última mascota vista para recargar después
            localStorage.setItem('lastPetId', id);
            showPetDetail(id);

            // 2. Luego cambiamos de vista
            localStorage.setItem('currentView', 4);
            showView();
        }
        if (btnEdit) {
            const id = btnEdit.getAttribute("data-id");
            // Guardamos el ID en localStorage para saber a quién estamos editando luego
            localStorage.setItem('editPetId', id);

            // Llamamos a una función para llenar el formulario
            loadPetDataToEdit(id);

            localStorage.setItem('currentView', 3);
            showView();
        }
        if (btnDelete) {
            const id = btnDelete.getAttribute("data-id");
            deletePet(id);
        }
    })

}

function showView() {
    const current = localStorage.getItem('currentView')
    views.forEach(element => {
        element.classList.remove('animateView')
        element.style.display = 'none'

    });

    if (current == 1) {
        listPets();
    }
    if (current == 3) {
        const editId = localStorage.getItem('editPetId');
        if (editId) {
            loadPetDataToEdit(editId);
        }
    }
    if (current == 4) {
        const lastId = localStorage.getItem('lastPetId');
        if (lastId) {
            showPetDetail(lastId);
        }
    }

    views[localStorage.getItem('currentView')].classList.add('animateView')
    views[localStorage.getItem('currentView')].style.display = 'block'
}