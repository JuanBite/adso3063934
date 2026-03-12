import { useState } from "react";
import { useNavigate, Link } from "react-router-dom";
import Swal from "sweetalert2";
import "../components/Show.css";
import { createPet } from "../api/api";

function Add() {

    const navigate = useNavigate();

    const [form, setForm] = useState({
        name: "",
        kind: "",
        breed: "",
        weight: "",
        age: "",
        location: "",
        description: ""
    });

    const handleChange = (e) => {
        setForm({
            ...form,
            [e.target.name]: e.target.value
        });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        const token = localStorage.getItem("authToken");
        if (!token) {
            Swal.fire({
                title: "Invalid Token",
                text: "Login Again" || "Server error",
                icon: "error"
            }).then(() => {
                localStorage.removeItem('authToken')
                navigate("/");
            });
        }
        try {

            await createPet(form, token);

            Swal.fire({
                title: "Pet created!",
                icon: "success",
                timer: 1500
            });

            navigate("/dashboard");

        } catch (error) {

            Swal.fire({
                title: "Fail to create pet",
                text: error.response?.data?.message || "Server error",
                icon: "error"
            }).then(() => {
                localStorage.removeItem('authToken')
                navigate("/");
            });

            console.error(error);
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
        <main id="Add">

            <header>

                <Link to="/dashboard" className="btnBack">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M232,144a64.07,64.07,0,0,1-64,64H80a8,8,0,0,1,0-16h88a48,48,0,0,0,0-96H51.31l34.35,34.34a8,8,0,0,1-11.32,11.32l-48-48a8,8,0,0,1,0-11.32l48-48A8,8,0,0,1,85.66,45.66L51.31,80H168A64.07,64.07,0,0,1,232,144Z"></path>
                    </svg>
                </Link>

                <h4>Add</h4>

                <Link className="btnLogout" onClick={handleLogout}>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M120,216a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V40a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H56V208h56A8,8,0,0,1,120,216Zm109.66-93.66-40-40a8,8,0,0,0-11.32,11.32L204.69,120H112a8,8,0,0,0,0,16h92.69l-26.35,26.34a8,8,0,0,0,11.32,11.32l40-40A8,8,0,0,0,229.66,122.34Z"></path>
                    </svg>
                </Link>

            </header>

            <form onSubmit={handleSubmit}>

                <label>
                    Name:
                    <input
                        type="text"
                        name="name"
                        placeholder="Max..."
                        value={form.name}
                        onChange={handleChange}
                    />
                </label>

                <label>
                    Kind:
                    <input
                        type="text"
                        name="kind"
                        placeholder="Dog..."
                        value={form.kind}
                        onChange={handleChange}
                    />
                </label>

                <label>
                    Breed:
                    <input
                        type="text"
                        name="breed"
                        placeholder="Husky..."
                        value={form.breed}
                        onChange={handleChange}
                    />
                </label>

                <label>
                    Weight:
                    <input
                        type="number"
                        name="weight"
                        placeholder="18kg..."
                        value={form.weight}
                        onChange={handleChange}
                    />
                </label>

                <label>
                    Age:
                    <input
                        type="number"
                        name="age"
                        placeholder="6 months..."
                        value={form.age}
                        onChange={handleChange}
                    />
                </label>

                <label>
                    Location:
                    <input
                        type="text"
                        name="location"
                        placeholder="New York..."
                        value={form.location}
                        onChange={handleChange}
                    />
                </label>

                <label>
                    Description:
                    <textarea
                        name="description"
                        placeholder="Feed only chicken..."
                        value={form.description}
                        onChange={handleChange}
                    ></textarea>
                </label>

                <div className="actions">
                    <button type="submit" className="Add">Save</button>
                    <Link to="/dashboard" className="btnBack">Cancel</Link>
                </div>

            </form>

        </main>
    );
}

export default Add;