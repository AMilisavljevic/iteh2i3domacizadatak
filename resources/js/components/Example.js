import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    
                       
                                <div className="title"><h1>Dobro došli!</h1></div>
                                <div className="paragraf">
                                    <p>Zvanična stranica plivačkog kluba Cunami iz Beograda</p>
                                    <p>Možete pogledati bazene na kojima održavamo redovne treninge za građane.<br></br>
                                    <a href="/bazeni"><button className="my-button">Bazeni</button></a></p>
                                    <p>Izaberite termin koji Vama najviše odgovara i pridružite se cunamiju zdravog života.</p>
                                    
                                </div>
                            
                        
                   
                </div>
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
