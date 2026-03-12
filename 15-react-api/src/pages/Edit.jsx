import { useState, useEffect } from "react";
import { useNavigate, useParams, Link } from "react-router-dom";
import Swal from "sweetalert2";
import "../components/Show.css";
import { getPet, editPet } from "../api/api";

function Edit() {
  const navigate = useNavigate();
  const { id } = useParams();
  const [pet, setPet] = useState({
    name: "",
    kind: "",
    breed: "",
    weight: "",
    age: "",
    location: "",
    description: "",
  });

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
        icon: "error",
      });
      navigate("/dashboard");
    }
  };

  const handleChange = (e) => {
    setPet({
      ...pet,
      [e.target.name]: e.target.value,
    });
  };

  const handleSubmit = async () => {
    try {
      await editPet(id, pet);
      Swal.fire({
        title: "Success",
        text: "Pet updated successfully",
        icon: "success",
        timer: 1500,
      });
      navigate("/dashboard");
    } catch (error) {
      Swal.fire({
        title: "Error",
        text: error.response?.data?.message || "Failed to update pet",
        icon: "error",
      });
    }
  };

  const handleCancel = () => {
    navigate("/dashboard");
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
    <main id="Edit">
      <header>
        <Link to="/dashboard" className="btnBack">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 256 256">
            <path d="M232,144a64.07,64.07,0,0,1-64,64H80a8,8,0,0,1,0-16h88a48,48,0,0,0,0-96H51.31l34.35,34.34a8,8,0,0,1-11.32,11.32l-48-48a8,8,0,0,1,0-11.32l48-48A8,8,0,0,1,85.66,45.66L51.31,80H168A64.07,64.07,0,0,1,232,144Z"></path>
          </svg>
        </Link>
        <h4>Edit</h4>
        <Link className="btnLogout" onClick={handleLogout}>
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 256 256">
            <path d="M120,216a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V40a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H56V208h56A8,8,0,0,1,120,216Zm109.66-93.66-40-40a8,8,0,0,0-11.32,11.32L204.69,120H112a8,8,0,0,0,0,16h92.69l-26.35,26.34a8,8,0,0,0,11.32,11.32l40-40A8,8,0,0,0,229.66,122.34Z"></path>
          </svg>
        </Link>
      </header>

      <form>
        <label>
          Name:
          <input type="text" name="name" value={pet.name} onChange={handleChange} placeholder="Max..." />
        </label>
        <label>
          Kind:
          <input type="text" name="kind" value={pet.kind} onChange={handleChange} placeholder="Dog..." />
        </label>
        <label>
          Breed:
          <input type="text" name="breed" value={pet.breed} onChange={handleChange} placeholder="Husky..." />
        </label>
        <label>
          Weight:
          <input type="number" name="weight" value={pet.weight} onChange={handleChange} placeholder="18kg..." />
        </label>
        <label>
          Age:
          <input type="number" name="age" value={pet.age} onChange={handleChange} placeholder="6 months..." />
        </label>
        <label>
          Location:
          <input type="text" name="location" value={pet.location} onChange={handleChange} placeholder="New York..." />
        </label>
        <label>
          Description:
          <textarea name="description" value={pet.description} onChange={handleChange} placeholder="Feed only chicken..."></textarea>
        </label>

        <div className="actions">
          <button type="button" className="btnSaveEdit" onClick={handleSubmit}>Save</button>
          <button type="button" className="btnCancel" onClick={handleCancel}>Cancel</button>
        </div>
      </form>
    </main>
  );
}

export default Edit;