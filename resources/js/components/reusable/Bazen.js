import React, { Component } from 'react';

export default class Bazen extends Component {
    constructor(props){
        super(props);
        this.state={
            bazen: this.props.bazen,
            images: [
                {
                    id:1,
                    src: "../images/25maj.png",
                },
                {
                    id:2,
                    src: "../images/tas2.jpg",
                },
            ],
        }

    }
    render() {
        return (
            <div className="bazen">
               {/* slika za svaki bazen(bilo bi lepo)*/}
               <div className="card bazen-card">
                    <h2>{this.state.bazen.naziv}</h2>
                    <img src={this.state.bazen.id==1 ? this.state.images[0].src : this.state.images[1].src} size="cover" alt="tas"/>
               </div>
            </div>
        );
    }
}
