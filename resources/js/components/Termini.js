import Axios from 'axios';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Termin from "./reusable/Termin"

export default class Termini extends Component {

    constructor(props) {
        super(props);
        this.state = {
            bazenID: props.bazenID,
            termini: [],
            ime: "",
            prezime: "",
            telefon: "",
            vestina_plivanja: "",
            datum_prijave: "",
            id_termin: "",
            poruka: "",
            error: "",
        }

        this.selectTermin = this.selectTermin.bind(this);
        this.handleInputChange = this.handleInputChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);

        if (this.state.bazenID) {
            console.log("po ID-u");
            this.getSveTermineBazenaPoIdu();
        } else {
            console.log("svi");
            this.getSveTermine();
        }
    }


    selectTermin(t) {
        this.setState({ id_termin: t.id });
    }

    getSveTermineBazenaPoIdu() {
        Axios.get("http://127.0.0.1:8000/termin/get-sve?id=" + this.state.bazenID).then(res => this.setState({ termini: res.data.termini }))
    }

    getSveTermine() {
        Axios.get("http://127.0.0.1:8000/termin/get-sve").then(res => this.setState({ termini: res.data.termini }))
    }

    closeModal() {
        $('.modal').modal('hide');
        this.setState({
            error: "",
            poruka: "",
        });
    }

    handleInputChange(e) {

        const { id, value } = e.target;
        this.setState((prevInput) => ({
            ...prevInput,
            [id]: value,
        }));

    }

    handleSubmit(e) {

        if (!this.state.ime || !this.state.prezime || !this.state.telefon || !this.state.vestina_plivanja || /^\s*$/.test(this.state.ime, this.state.prezime, this.state.telefon, this.state.vestina_plivanja)) {
            this.setState({
                error: "Morate popuniti sva polja",
            })
            return;
        } else {
            this.setState({
                error: "",
            });
            let ime_prezime = `${this.state.ime} ${this.state.prezime}`;

            let today = new Date();
            let d = today.getDate() < 10 ? `0${today.getDate()}` : today.getDate();
            let m =
                today.getMonth() < 10 ? `0${today.getMonth() + 1}` : today.getMonth();
            let y = today.getFullYear();
            let datum = `${y}-${m}-${d}`;

            Axios.post("/prijava/create", {
                ime_prezime: ime_prezime,
                telefon: this.state.telefon,
                vestina_plivanja: this.state.vestina_plivanja,
                datum_prijave: datum,
                id_termin: this.state.id_termin,
            }).then(res => {

                if (res.data.postoji_prijava){
                    Axios.put('/prijava/' + res.data.prijava_id, {
                        bivsiTermin: res.data.prijava_id_termin,
                        id_termin: this.state.id_termin,
                    }).then(res => {
                        this.setState({
                            ime: "",
                            prezime: "",
                            telefon: "",
                            vestina_plivanja: "",
                            datum_prijave: "",
                            id_termin: "",
                            poruka: res.data.obavestenje,
                            error: "",
                        })
                    });
                    return;
                }
                console.log(res.data);
                this.setState({
                    ime: "",
                    prezime: "",
                    telefon: "",
                    vestina_plivanja: "",
                    datum_prijave: "",
                    id_termin: "",
                    poruka: res.data.obavestenje,
                    error: "",
                });

            })
            e.preventDefault();
        }



    }

    render() {
        return (
            <>
                <div className="container">
                    <div className="title"><h1>Termini</h1></div>
                    {this.state.termini.map((termin, index) =>
                        <div key={index}>
                            <Termin termin={termin} svi={!this.props.bazenID} selectTermin={this.selectTermin} />
                        </div>
                    )}
                </div>
                <div className="modal fade" id="exampleModal" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div className="modal-dialog" role="document">
                        <div className="modal-content">
                            <div className="close-modal-area">
                                <i className="close-modal-icon fas fa-times" onClick={() => this.closeModal()} />
                            </div>
                            {this.state.poruka ?
                                (<div className="poruka-prijave">
                                    <h4 className="poruka">{this.state.poruka}</h4>
                                    <button className="my-button" onClick={() => this.closeModal()} >
                                        Potvrdi
                        </button></div>)
                                :
                                (<form className="form">
                                    <div className="row g-3">
                                        <div className="col-6">
                                            <label htmlFor="ime">Ime</label>
                                            <input required id="ime" type="text" onChange={this.handleInputChange} className="form-control" placeholder="Ime" value={this.state.ime} aria-label="First name" />
                                        </div>
                                        <div className="col-6">
                                            <label htmlFor="prezime">Prezime</label>
                                            <input required id="prezime" type="text" onChange={this.handleInputChange} className="form-control" placeholder="Prezime" value={this.state.prezime} aria-label="Last name" />
                                        </div>
                                    </div>
                                    <div className="row g-3">
                                        <div className="col-6">
                                            <label htmlFor="telefon">Broj telefona:</label>
                                            <input required type="tel" id="telefon" onChange={this.handleInputChange} className="form-control" name="phone" placeholder="Telefon" value={this.state.telefon} pattern="[0-9]{3}[0-9]{3}[0-9]{4}" />
                                        </div>
                                    </div>
                                    <div className="row g-3">
                                        <div className="select col-12">
                                            <label htmlFor="vestina_plivanja">Stil plivanja</label>
                                            <select required id="vestina_plivanja" className="form-select" aria-label="Default select example" onChange={this.handleInputChange}>
                                                <option defaultValue></option>
                                                <option value="delfin">Delfin</option>
                                                <option value="ledjno">Leđno</option>
                                                <option value="prsno">Prsno</option>
                                                <option value="kraul">Kraul</option>
                                            </select>
                                        </div>
                                    </div>
                                    <span className="error">{this.state.error}</span>

                                    <button className="my-button" onClick={this.handleSubmit}>
                                        Potvrdi
                        </button>

                                </form>)
                            }

                        </div>
                    </div>
                </div>
            </>
        );
    }
}

if (document.getElementById('termini')) {
    const el = document.getElementById('termini');

    const bazenID = el.dataset.id_bazen;
    console.log(bazenID);

    ReactDOM.render(<Termini bazenID={bazenID} />, document.getElementById('termini'));
}
