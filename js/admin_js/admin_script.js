$(document).ready(function() {
    //check admin password is corrct or not

    $("#current_pwd").keyup(function() {
        var current_pwd = $("#current_pwd").val();

        $.ajax({
            type: "post",
            url: "/admin/check-current-pwd",
            data: { current_pwd: current_pwd },
            success: function(res) {

                if (res == "false") {
                    $(checkCurrentPwd).html(
                        "<font color=red> Current password is incorrect</font>"
                    );
                } else if (res == "true") {
                    $(checkCurrentPwd).html(
                        "<font color=green > Current password is correct</font>"
                    );
                }
            },
            error: function() {
                alert("Errors");
            }
        });
    });


    $(".updateServiceStatus").click(function () {
        var status = $(this).text();
        var service_id = $(this).attr('service_id');
        $.ajax({
            type: 'post',
            url: '/admin/update-service-status',
            data: { service_id: service_id, status: status },
            success: function (res) {
                if (res['status'] == 0) {
                   $("#service-"+service_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>Inactive</a>")
                } else if (res['status'] == 1) {
                    $("#service-"+service_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>Active</a>")
                }
            }, error: function () {
                alert('Error')
            }
        });
    });

    
    $(".updateCentreStatus").click(function () {
        var status = $(this).text();
        var centre_id = $(this).attr('centre_id');
        $.ajax({
            type: 'post',
            url: '/admin/update-centre-status',
            data: { centre_id: centre_id, status: status },
            success: function (res) {
                if (res['status'] == 0) {
                   $("#centre-"+centre_id).html("<a class='updateCentreStatus' href='javascript:void(0)'>Inactive</a>")
                } else if (res['status'] == 1) {
                    $("#centre-"+centre_id).html("<a class='updateCentreStatus' href='javascript:void(0)'>Active</a>")
                }
            }, error: function () {
                alert('Error')
            }
        });
    })


    $("#confirm_pwdr").keyup(function() {
        var confirm_pwd = $("#confirm_pwd").val();

        $.ajax({
            type: "post",
            url: "/admin/confirm-passwor",
            data: {confirm_pwd: confirm_pwd },
            success: function(res) {

                if (res == "false") {
                    $(confirmPassword).html(
                        "<font color=red> password matches </font>"
                    );
                } else if (res == "true") {
                    $(confirmPassword).html(
                        "<font color=green >passwords didnt match </font>"
                    );
                }
            },
            error: function() {
                alert("Errors");
            }
        });
    });

    $("#centre_id").select2({
    placeholder:"Select Centres",
    })

    $('.confirmDelete').click(function() {
        var record = $(this).attr('record');
        var recordid = $(this).attr('recordid');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
             
                window.location.href = "/admin/" + record + "/" + 'create' ;
            }
          })
        return false;
    })  


    var charts = {
		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

			this.ajaxGetPostMonthlyData();

		},

		ajaxGetPostMonthlyData: function () {
			var urlPath =  'http://' + window.location.hostname + '/get-post-chart-data';
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response ) {
				console.log( response );
				charts.createCompletedJobsChart( response );
			});
		},

		/**
		 * Created the Completed Jobs Chart
		 */
		createCompletedJobsChart: function ( response ) {

			var ctx = document.getElementById("myAreaChart");
			var myLineChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: response.months, // The response got from the ajax request containing all month names in the database
					datasets: [{
						label: "Sessions",
						lineTension: 0.3,
						backgroundColor: "rgba(2,117,216,0.2)",
						borderColor: "rgba(2,117,216,1)",
						pointRadius: 5,
						pointBackgroundColor: "rgba(2,117,216,1)",
						pointBorderColor: "rgba(255,255,255,0.8)",
						pointHoverRadius: 5,
						pointHoverBackgroundColor: "rgba(2,117,216,1)",
						pointHitRadius: 20,
						pointBorderWidth: 2,
						data: response.post_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months
					}],
				},
				options: {
					scales: {
						xAxes: [{
							time: {
								unit: 'date'
							},
							gridLines: {
								display: false
							},
							ticks: {
								maxTicksLimit: 7
							}
						}],
						yAxes: [{
							ticks: {
								min: 0,
								max: response.max, // The response got from the ajax request containing max limit for y axis
								maxTicksLimit: 5
							},
							gridLines: {
								color: "rgba(0, 0, 0, .125)",
							}
						}],
					},
					legend: {
						display: false
					}
				}
			});
		}
	};

	charts.init();

});

// ( function ( $ ) {

	

// } )( jQuery );
