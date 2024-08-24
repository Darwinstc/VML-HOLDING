import ReactDOM from 'react-dom/client';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import React from 'react'
import "bootstrap/dist/css/bootstrap.min.css"

import LayoutPublic from './layouts/LayoutPublic';
import Login from './pageauth/Login';
import Register from './pageauth/Register';
import PageHome from './pagePublic/pageHome';

import ProtectedRoutes from './pageauth/ProtectedRoutes';
import LayoutAdmin from './layouts/LayoutAdmin';
import LayoutClient from './layouts/LayoutClient';
import Dashboard from './pageAdmin/DashboardAdmin';


export const App = () => {
  return (
   <>
   <Router>
    <Routes>
        {/*///////////////RUTAS PUBLICAS//////////////////////////////// */}
      <Route path="/" element={<LayoutPublic/>}>
         <Route index element={<PageHome/>}/>
          <Route path="/login" element={<Login />}/>
          <Route path="/Register" element={<Register />}/>
      </Route>
       {/*///////////////RUTAS PRIVADAS//////////////////////////////// */}
      <Route element={<ProtectedRoutes/>}>
      
          <Route path="/admin" element={<LayoutAdmin />}>
               <Route index element={<Dashboard/>}/>
          </Route>

          <Route path="/client" element={<LayoutClient />}>
               <Route index element={<PageHome/>}/>
          </Route>

      </Route>

    </Routes>
   </Router>
   </>
  )
}

if (document.getElementById('root')) {
    const Index = ReactDOM.createRoot(document.getElementById("root"));

    Index.render(
        <React.StrictMode>
            <App/>
        </React.StrictMode>
    )
}