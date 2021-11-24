const rows = document.querySelectorAll("tr") ? [...document.querySelectorAll("tr")] : [];
rows.map(row => {
    const btn = row?.querySelector(".radioColor")?.querySelector(".form-check-input");
    if (btn) {
        btn.addEventListener('click', async () => {
            const id = row.getAttribute('data-id');
            const query = await fetch(
                `/api/v2/themes/${id}`,
                {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }
            )
            const status = query.status;

            if (status === 200) {
                if(btn.checked === true) {
                    rows
                        .filter(row => row?.querySelector(".radioColor")?.querySelector(".form-check-input") !== btn && row?.querySelector(".radioColor")?.querySelector(".form-check-input").checked === true)
                        .map(row => {
                            row.querySelector(".radioColor").querySelector(".form-check-input").checked = false;
                        })
                }
            }
        });
    }

});

