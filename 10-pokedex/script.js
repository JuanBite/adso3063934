const contenedorPokemones = document.getElementById("pokemonContainer");
const filtroTipo = document.getElementById("typeFilter");
const modal = document.getElementById("pokemonModal");
const modalBody = document.getElementById("modalBody");
const cerrarModal = document.getElementById("closeModal");

let listaDePokemones = [];    

function obtenerTipos() {
  fetch("https://pokeapi.co/api/v2/type")
    .then(respuesta => respuesta.json())
    .then(datos => {
      let tipos = datos.results;

      for (let i = 0; i < tipos.length; i++) {
        let opcion = document.createElement("option");
        opcion.value = tipos[i].name;
        opcion.textContent = tipos[i].name.toUpperCase();
        filtroTipo.appendChild(opcion);
      }
    });
}

function obtenerPokemones() {
  for (let i = 1; i <= 200; i++) {
    fetch(`https://pokeapi.co/api/v2/pokemon/${i}`)
      .then(respuesta => respuesta.json())
      .then(pokemon => {
        listaDePokemones.push(pokemon);
        mostrarPokemon(pokemon);
      });
  }
}

function mostrarPokemon(pokemon) {
  let tarjeta = document.createElement("div");
  tarjeta.classList.add("pokemon-card");

  let nombre = document.createElement("h3");
  nombre.textContent = pokemon.name.toUpperCase();

  let imagen = document.createElement("img");
  imagen.src = pokemon.sprites.front_default;

  let tipo = document.createElement("p");
  let tipos = "";
  for (let i = 0; i < pokemon.types.length; i++) {
    tipos += pokemon.types[i].type.name;
    if (i < pokemon.types.length - 1) {
      tipos += ", ";
    }
  }
  tipo.textContent = "Tipo: " + tipos;

  tarjeta.appendChild(nombre);
  tarjeta.appendChild(imagen);
  tarjeta.appendChild(tipo);

  tarjeta.addEventListener("click", function () {
    abrirModal(pokemon);
  });

  contenedorPokemones.appendChild(tarjeta);
}

function abrirModal(pokemon) {
  modal.classList.remove("hidden");

  let tipos = "";
  for (let i = 0; i < pokemon.types.length; i++) {
    tipos += pokemon.types[i].type.name;
    if (i < pokemon.types.length - 1) {
      tipos += ", ";
    }
  }

  modalBody.innerHTML = `
    <h2>${pokemon.name.toUpperCase()}</h2>
    <img src="${pokemon.sprites.other["official-artwork"].front_default}" width="200" />
    <p><strong>Tipo:</strong> ${tipos}</p>
    <p><strong>Altura:</strong> ${pokemon.height}m</p>
    <p><strong>Peso:</strong> ${pokemon.weight}kg</p>
  `;
}

cerrarModal.addEventListener("click", function () {
  modal.classList.add("hidden");
});

filtroTipo.addEventListener("change", function () {
  let tipoSeleccionado = filtroTipo.value;

  contenedorPokemones.innerHTML = "";

  if (tipoSeleccionado === "all") {
    for (let i = 0; i < listaDePokemones.length; i++) {
      mostrarPokemon(listaDePokemones[i]);
    }
  } else {
    for (let i = 0; i < listaDePokemones.length; i++) {
      let pokemon = listaDePokemones[i];
      let tieneTipo = false;

      for (let j = 0; j < pokemon.types.length; j++) {
        if (pokemon.types[j].type.name === tipoSeleccionado) {
          tieneTipo = true;
        }
      }

      if (tieneTipo) {
        mostrarPokemon(pokemon);
      }
    }
  }
});

obtenerTipos();
obtenerPokemones();
