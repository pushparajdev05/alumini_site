$(document).ready(() => { 
    $("#load_csv").click(() => {
        const csv_file = document.getElementById("csv").files;
        console.log(csv_file);
        const file = new FormData();
        if (csv_file.length > 0)
        {
            file.append("csv", csv_file[0]);
            $.ajax({
                type: 'POST',
                url: 'backend/aluminis/load_csv.php',
                data: file,
                contentType: false,
                processData: false,
                success: function (res) {
                    let taken = parseInt(res);
                    console.log(res);
                    if (taken == 1)
                    {
                        Swal.fire({
                            icon: "success",
                            text: "CSV data successfully loaded into the database!",
                        });
                    }
                    else
                    {
                        Swal.fire({
									icon: "error",
									title: "Oops...",
									text: res,
								});
                        }
                }
            });
        }
        else {
            Swal.fire({
                icon: "warning",
                title: "Oops...",
                text: "kindly select csv file first",
            });
        }
    });
    $("#upload_img").click(() => {
        const img_files = document.getElementById("img_files").files; 
        const file = new FormData();
        if (img_files.length > 0)
        {
            console.log(img_files);

            for (let i = 0; i < img_files.length; i++)
            {
                file.append("img_files[]", img_files[i]);
            }
            // for (var pair of file.entries())
            // {
            //     console.log(pair[0] + ': ' + pair[1].name);
            // }
            $.ajax({
                type: 'POST',
                url: 'backend/aluminis/load_img.php',
                data: file,
                dataType:'json',
                contentType: false,
                processData: false,
                success: function (res) {
                    // const image_error = JSON.parse(res);
                    console.log("there is a response that you requested to server");
                    console.log(res);
                    //  let taken = paresInt(res);
                    if (res[0] == 1)
                    {
                        Swal.fire({
                            icon: "success",
                            text: res[1],
                        });
                    }
                    else if (res[0] == 101)
                    {
                        Swal.fire({
                            icon: "warning",
                            html: `<p style='text-align:justify'>Number of non valid images : ${res[1]}<br>
                                    list of image not uploaded :${res[2]} <br><br>
                                    ${res[3]}`
                        });
                    }
                     else
                    {
                        Swal.fire({
									icon: "error",
									title: "Oops...",
									text: res[1],
								});
                        }

                },
                error: function (xhr, status, error)
                {
                    console.error('Request failed: ' + error);
                    console.log(xhr.responseText);
                    Swal.fire({
									icon: "error",
									title: "Oops...",
                        html: `The response has error that might be in json type ,<br> the respone is :
                                    ${xhr.responseText}`,
								});
                }
                
            });
        }
        else {
            Swal.fire({
                icon: "warning",
                title: "Oops...",
                text: "kindly select image files(.jpg, .png, .jpeg) first",
            });
        }
    });
});