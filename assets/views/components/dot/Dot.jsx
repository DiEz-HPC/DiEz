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
            <span style={style} className={'dot'}>.</span>
        </>
    )
}

export default Dot;