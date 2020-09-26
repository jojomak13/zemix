document.querySelector("table").addEventListener("click", function(e) {
    let el = e.target;
    if (el.classList.contains("show-history")) {
        getHistory(el.getAttribute("data-order"));
    } else if (
        el.tagName === "I" &&
        el.parentElement.classList.contains("show-history")
    ) {
        getHistory(el.parentElement.getAttribute("data-order"));
    }
});

function getHistory(id) {
    $("#history-content").html("");

    $.get({
        url: `/dashboard/orders/${id}/history`,
        success: function(res) {
            let history = [];

            res.forEach(el => {
                history.unshift(`
                <div class="row p-t-20">
                    <div class="col-auto text-right update-meta p-r-0">
                        <i class="b-primary update-icon ring"></i>
                    </div>
                    <div class="col p-l-5">
                        <a href="javascript:void(0)">
                            <h6>${el.status} - <span>${el.created_at}</span></h6>
                        </a>
                        <p class="text-muted m-b-0">
                            ${el.name}
                        </p>
                    </div>
                </div>`);
            });

            $("#history-content").html(history.join(""));
            $("#order-history").modal("show");
        }
    });
}
