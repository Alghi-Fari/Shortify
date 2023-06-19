function handleDelete(target) {
    let formDelete = document.querySelector("#formDelete");
    let deleteModal = document.querySelector("#deleteModal");
    const deleteModalBtn = document.querySelectorAll("#deleteModalBtn");

    deleteModalBtn.forEach((data) => {
        data.addEventListener("click", function (e) {
            deleteModal.setAttribute("id", `deleteModal_${data.dataset.id}`);
            formDelete.setAttribute("action", data.dataset.url);
        });
    });
}
