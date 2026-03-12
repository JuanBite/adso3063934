import { BrowserRouter, Routes, Route } from 'react-router-dom';
import './App.css';
import Login from './components/Login';
import Dashboard from './pages/dashboard';
import Show from './pages/Show';
import Edit from './pages/Edit';
import Add from './pages/Add';

function App() {
  return (
    <BrowserRouter>
      <div className="App">
        <Routes>
          <Route path="/" element={<Login />} />
          <Route path="/dashboard" element={<Dashboard />} />
          <Route path="/show/:id" element={<Show />} />
          <Route path="/edit/:id" element={<Edit />} />
          <Route path="/add" element={<Add />} />
        </Routes>
      </div>
    </BrowserRouter>
  );
}

export default App; 