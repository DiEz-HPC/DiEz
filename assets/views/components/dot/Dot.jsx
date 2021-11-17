import React from "react";
import './dot.scss';

function Dot(props){
    const {color, size} = props;

    const style = {
        color: color ?? '',
        fontSize: size ?? ''
    }
    return (
        <>
            <i style={style} className="fas fa-circle dot ms-2"></i>
        </>
    )
}

export default Dot;