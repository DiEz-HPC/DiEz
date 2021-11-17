import React from "react";
import "./Cursor.scss";

function Cursor() {
  return (
    <>
      <div className="dot-cursor">
        <div className="cursor-dot-outline"></div>
        <div className="cursor-dot"></div>
      </div>
    </>
  );
}

export default Cursor;
