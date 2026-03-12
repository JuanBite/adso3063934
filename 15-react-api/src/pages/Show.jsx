import { useState, useEffect } from "react";
import { useNavigate, useParams, Link } from "react-router-dom";
import Swal from "sweetalert2";
import "../components/Show.css";
import { getPet } from "../api/api";

function Show() {

  const navigate = useNavigate();
  const { id } = useParams();
  const [pet, setPet] = useState({});

  useEffect(() => {
    loadPet();
  }, []);

  const loadPet = async () => {
    try {

      const response = await getPet(id);
      setPet(response.data.pet);

    } catch (error) {

      Swal.fire({
        title: "Error",
        text: error.response?.data?.message || "Pet not found",
        icon: "error"
      });

      navigate("/dashboard");
    }
  };
  
  const handleLogout = async () => {

  const confirm = await Swal.fire({
    title: "Log out?",
    text: "Your current session will be closed.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, log out",
    cancelButtonText: "Cancel"
  });

  if (!confirm.isConfirmed) return;

  localStorage.removeItem("authToken");
  navigate("/");

};

  return (
    <main id="show">

      <header>

        <Link to="/dashboard" className="btnBack">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 256 256">
            <path d="M232,144a64.07,64.07,0,0,1-64,64H80a8,8,0,0,1,0-16h88a48,48,0,0,0,0-96H51.31l34.35,34.34a8,8,0,0,1-11.32,11.32l-48-48a8,8,0,0,1,0-11.32l48-48A8,8,0,0,1,85.66,45.66L51.31,80H168A64.07,64.07,0,0,1,232,144Z"></path>
          </svg>
        </Link>

        <h4>Show</h4>

        <Link className="btnLogout" onClick={handleLogout}>
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 256 256">
            <path d="M120,216a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V40a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H56V208h56A8,8,0,0,1,120,216Zm109.66-93.66-40-40a8,8,0,0,0-11.32,11.32L204.69,120H112a8,8,0,0,0,0,16h92.69l-26.35,26.34a8,8,0,0,0,11.32,11.32l40-40A8,8,0,0,0,229.66,122.34Z"></path>
          </svg>
        </Link>

      </header>

      <section className="pet-detail">

        <img
          src={`http://127.0.0.1:8000/images/${pet.image}`}
          alt={pet.name}
        />

        <div className="card-info">

          <div className="item">
            <span>Name:</span> {pet.name}
          </div>

          <div className="item">
            <span>Y/O:</span> {pet.age}
          </div>

          <div className="item">
            <span>Breed:</span> {pet.breed}
          </div>

          <div className="item">
            <span>Weight:</span> {pet.weight}
          </div>

          <div className="item">
            <span>Location:</span> {pet.location}
          </div>

          <div className="item">
            <span>Status:</span> {pet.status}
          </div>

        </div>

        <button className="btnAdopt">Adopt</button>

      </section>

    </main>
  );
}

export default Show;