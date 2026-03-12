import { useState, useEffect } from "react";
import { useNavigate, Link } from "react-router-dom";
import Swal from "sweetalert2";
import "../components/Show.css";
import { getPets, deletePet } from "../api/api";

function Dashboard() {

  const navigate = useNavigate();
  const [pets, setPets] = useState([]);

  useEffect(() => {
    const token = localStorage.getItem("authToken");

    if (!token) {
      navigate("/");
      return;
    }

    listPets();
  }, [navigate]);

  const listPets = async () => {
    try {
      const response = await getPets();
      setPets(response.data.pets);

    } catch (error) {

      Swal.fire({
        title: "Fail to load pets",
        text: error.response?.data?.message || "Server error",
        icon: "error",
        timer: 1500
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

  const petDelete = async (id) => {

  const confirm = await Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!"
  });

  if (!confirm.isConfirmed) return;

  try {

    await deletePet(id);

    await listPets();

    Swal.fire({
      title: "Deleted!",
      text: "Pet has been removed.",
      icon: "success",
      timer: 1500
    });

  } catch (error) {
    console.error(error);

    Swal.fire({
      title: "Fail to delete pet",
      text: error.response?.data?.message || "Server error",
      icon: "error"
    });

  }
};

  return (
    <main id="dashboard">

      <header>
        <h4>Dashboard</h4>
      </header>

      <nav>
        <Link to="/Add" className="btnAdd">
          Add
        </Link>

        <Link className="btnLogout" onClick={handleLogout}>
          Logout
        </Link>
      </nav>

      <section className="list">

        {pets.map((pet) => (
          <div className="row" key={pet.id}>

            <img src={`http://127.0.0.1:8000/images/${pet.image}`} alt={pet.name} />

            <div className="data">
              <h3>{pet.name}</h3>
            </div>

            <nav className="actions">

              <Link to={`/show/${pet.id}`} className="btnShow"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                viewBox="0 0 256 256">
                <path
                  d="M247.31,124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57,61.26,162.88,48,128,48S61.43,61.26,36.34,86.35C17.51,105.18,9,124,8.69,124.76a8,8,0,0,0,0,6.5c.35.79,8.82,19.57,27.65,38.4C61.43,194.74,93.12,208,128,208s66.57-13.26,91.66-38.34c18.83-18.83,27.3-37.61,27.65-38.4A8,8,0,0,0,247.31,124.76ZM128,192c-30.78,0-57.67-11.19-79.93-33.25A133.47,133.47,0,0,1,25,128,133.33,133.33,0,0,1,48.07,97.25C70.33,75.19,97.22,64,128,64s57.67,11.19,79.93,33.25A133.46,133.46,0,0,1,231.05,128C223.84,141.46,192.43,192,128,192Zm0-112a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Z">
                </path>
              </svg></Link>

              <Link to={`/edit/${pet.id}`} className="btnEdit"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                viewBox="0 0 256 256">
                <path
                  d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z">
                </path>
              </svg></Link>

              <Link onClick={() => petDelete(pet.id)} className="btnDelete"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                viewBox="0 0 256 256">
                <path
                  d="M216,48H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM192,208H64V64H192ZM80,24a8,8,0,0,1,8-8h80a8,8,0,0,1,0,16H88A8,8,0,0,1,80,24Z">
                </path>
              </svg></Link>

            </nav>

          </div>
        ))}

      </section>

    </main>
  );
}

export default Dashboard;