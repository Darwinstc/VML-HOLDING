import axios from "axios";

const base_api_url = "http://localhost:8000/api";

export default{
    getRegister:(data)=>axios.post(`${base_api_url}/auth/register`,data),
    getLogin:(data)=>axios.post(`${base_api_url}/auth/login`,data)
}