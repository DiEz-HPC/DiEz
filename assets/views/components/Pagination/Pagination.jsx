import * as React from "react";
import Pagination from "@mui/material/Pagination";
import Stack from "@mui/material/Stack";
import './pagination.scss';

export default function PaginationOutlined(props) {
    const {setPage, pageNumber} = props;
    console.log(pageNumber);
  return (
    <Stack spacing={2}>
      <Pagination
        count={pageNumber}
        onChange={(event, value) => {
          setPage(value);
          window.scrollTo(0, 0);
        }}
        color="primary"
      />
    </Stack>
  );
}
