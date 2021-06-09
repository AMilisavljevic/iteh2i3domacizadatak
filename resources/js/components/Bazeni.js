import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Axios from 'axios';
import Bazen from "./reusable/Bazen"

export default class Bazeni extends Component {
    constructor(props) {
        super(props);
        this.state = {
            bazeni: [],
            
        }
        this.getSveBazene();
    }


    getSveBazene() {
        Axios.get("http://127.0.0.1:8000/bazen/get-sve").then(res => {
            this.setState({bazeni: res.data.bazeni});})
    }

    render() {
        return (
            <div className="stranica-bazeni">
                    <div className="title"><h1 >Naši bazeni</h1></div>
                    <div className="row justify-content-center">
                {this.state.bazeni.map((bazen, index)=>
                    <div key={index} className="col-6 col-lg-4">
                        <a href={`/bazen/${bazen.id}`}>
                            <Bazen bazen={bazen}/>
                        </a>
                    </div>
                )}
                </div>
            </div>
        );
    }
}

if (document.getElementById('bazeni')) {
    ReactDOM.render(<Bazeni />, document.getElementById('bazeni'));
}

