import React, { useEffect, useState } from 'react'
import AuthUser from './AuthUser';
import { useNavigate } from 'react-router-dom';
import Config from '../Config';

function Login() {

  const {setToken, getToken}= AuthUser()
  const [messagge, setMessagge] = useState("");
  const [password, setpassword] = useState("");
  const [email, setEmail] = useState("");
  const navigate= useNavigate()

  useEffect(()=>{

    if(getToken()){
      navigate("/")
    }

  },[])

  const submitLogin = async(e)=>{

    e.preventDefault();

    Config.getLogin({email,password})
    .then(({data})=>{
            if (data.success){
              setToken(
                data.user,
                data.token,
                data.user.roles[0].name


              )
            }else{
                console.log("Datos invalidos")
            }
    }
)
}

  return (
    <div className='container'>
    <div className='row justify-content-center'>
        <div className='col-sm-4'>
            <div className='card-body'>

                <h1 className='text-center fw-bolder'>LOGIN</h1>

                <input type="email" className='form-control mt-3' placeholder='Email' value={email}
                 onChange={(e)=>setEmail(e.target.value)} required />

                     <input type="password" className='form-control mt-3' placeholder='password' value={password}
                 onChange={(e)=>setpassword(e.target.value)} required />

                 <button onClick={submitLogin} className='btn btn-primary W-100 mt-3'>Iniciar Sesion</button>
                 <a className=' W-100 mt-3'>Registrar me</a>
            </div>

        </div>

    </div>

</div>
  )
}

export default Login