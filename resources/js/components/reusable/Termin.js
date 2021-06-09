import React, { Component } from 'react';

export default class Termin extends Component {
    constructor(props) {
        super(props);
        this.state={
            termin:this.props.termin,
        }

    }

    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">
                                <div className="time"><h3>{this.state.termin.pocetak}-{this.state.termin.kraj}</h3></div>
                                {this.props.svi ? this.state.termin.bazen.naziv: ""}
                                <button onClick={()=>this.props.selectTermin(this.state.termin)} className="my-button" data-toggle="modal" data-target="#exampleModal">
                                    Prijavi se
                                </button>

                            </div>

                            <div className="card-body">
                                <p className="brSlob">Broj slobodnih mesta: {this.state.termin.slobodna_mesta}</p>
                                <p>{this.state.termin.opis}</p>
                                </div>
                        </div>
                    </div>
                </div>

            </div>
        );
    }
}

