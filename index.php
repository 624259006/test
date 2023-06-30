<?= $this->extend('layouts/user/header-main') ?>
<?= $this->section('title') ?>Table about meeting room<?= $this->endSection() ?>
<?= $this->section('header-content') ?>

<script src="<?= base_url("script/fullcalendar.global.js"); ?>"></script>
<script src="<?= base_url("script/fullcalendar.global.min.js"); ?>"></script>
<script src="<?= base_url("script/custom/my_fullcalendar.js"); ?>"></script>

<style>
  table,
  th,
  td {
    border: 1px solid black;
  }

  .bg-primarylight {
    border-radius: 25px;
    background-color: #B3EFFC;
    padding: 20px;

  }

  #calendar {
    max-height: 400px;
    margin: 0 auto;
    background-color: white;
  }

  a {
    text-decoration: none;
    color: black;
  }

  .fc-text-warning {
    background-color: #BBB600;
    color: white;
    border-radius: 5px !important;
  }

  .fc-text-danger {
    background-color: red;
    color: white;
    border-radius: 5px !important;
  }

  .fc-h-event {
    border: none !important;
    background-color: transparent !important;
  }

  #date,
  #date:focus {
    border: none;
    border-color: transparent;
    outline: none;
    background: transparent;
  }

  .wrapper {
    display: inline-flex;
    width: 100%;
    border-radius: 5px;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .wrapper .option {
    text-align: center;
    background: #fff;
    height: 40px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
    cursor: pointer;
    padding: 0 10px;
    border: 1px solid lightgray;
    transition: all 0.3s ease;
  }

  .wrapper .option .dot::before {
    position: absolute;
    content: "";
    top: 4px;
    left: 4px;
    width: 12px;
    height: 12px;
    background: #0069d9;
    border-radius: 50%;
    opacity: 0;
    transform: scale(1.5);
    transition: all 0.3s ease;
  }

  input[type="radio"] {
    display: none;
  }

  #option-1:checked:checked~.option-1,
  #option-2:checked:checked~.option-2,
  #option-3:checked:checked~.option-3 {
    border-color: green;
    background: green;
  }

  #option-1:checked:checked~.option-1 .dot,
  #option-2:checked:checked~.option-2 .dot,
  #option-3:checked:checked~.option-3 .dot {
    background: #fff;
  }

  #option-1:checked:checked~.option-1 .dot::before,
  #option-2:checked:checked~.option-2 .dot::before,
  #option-3:checked:checked~.option-3 .dot::before {
    opacity: 1;
    transform: scale(1);
  }

  #option-1:checked:checked~.option-1 span,
  #option-2:checked:checked~.option-2 span,
  #option-3:checked:checked~.option-3 span {
    color: #fff;
  }
</style>

<div class="container">
  <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
      <h5 class="text-center my-5">การจองห้องประชุม</h5>
      <form action="<?= base_url('booking/create_booking'); ?>" method="POST">
        <div class="row">
          <div class="cow-lg-12 py-3 bg-primarylight">
            <label for="room">ประเภทห้อง:</label>
            <select name="room_size" id="room_size" class="form-control">
              <option value="">- เลือกขนาดห้องประชุม -</option>
              <option value="เล็ก">เล็ก</option>
              <option value="กลาง">กลาง</option>
              <option value="ใหญ่">ใหญ่</option>
            </select>
            <div class="mt-3"></div>
            <label for="nameroom">ชื่อห้องประชุม:</label>
            <select name="nameroom" id="nameroom" class="form-control" autocomplete="false">
              <option value="" selected>- เลือกห้องประชุม -</option>
            </select>
            <div class="mt-3"></div>
            <label for="lname">จำนวนที่นั่ง:</label>
            <select name="chair" id="chair" class="form-control">
              <option value="" selected>- เลือกจำนวนที่นั่ง -</option>
            </select>
            <div class="mt-3"></div>
            <label for="remarks">จุดประสงค์ในการจอง:</label>
            <input type="text" id="remarks" name="remarks" value="" class="form-control" placeholder="จุดประสงค์">
            <div class="row mt-5"></div>
          </div>
          <div id="div-calendar-booking" class="col-lg-12 mt-4 bg-primarylight">
            <div class="row">
              <div class="col-lg-8">
                <div id="calendar"></div>
              </div>
              <div class="col-lg-4">
                <div class="wrapper row" style="height: 100%;">
                  <div class="col-lg-12 my-2" style="height: 40px;">
                    <input type="radio" name="time" id="option-1" value="MORNING" checked>
                    <label for="option-1" class="option option-1">
                      <span>เวลา 9.00 - 12.00 น.</span>
                    </label>
                  </div>
                  <div class="col-lg-12 my-2" style="height: 40px;">
                    <input type="radio" name="time" id="option-2" value="AFTERNOON">
                    <label for="option-2" class="option option-2">
                      <span>เวลา 13.00 - 16.00 น.</span>
                    </label>
                  </div>
                  <div class="col-lg-12 my-2" style="height: 40px;">
                    <input type="radio" name="time" id="option-3" value="FULLDATE">
                    <label for="option-3" class="option option-3">
                      <span>เวลา 9.00 - 16.00 น.</span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <p id="date_preview" class="text-center mt-2" style="width:100%;"></p>
                <input type="hidden" id="date" name="date" class="text-center" readonly>
              </div>
              <div class="col-lg-4"></div>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-lg-12 text-center">
            <input type="submit" class="btn btn-success" value="จองห้องประชุม">
            <a href="<?= base_url("home") ?>" class="btn btn-danger">กลับสู่หน้าหลัก</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-lg-1"></div>
</div>

<script>
  load_roomname_bysize();

  $('#room_size').on('change', function() {
    load_roomname_bysize();
  });

  function load_roomname_bysize() {
    if ($('#room_size').val() != "") {

      var formData = new FormData();
      formData.append('size', $('#room_size').val());

      $.ajax({
        url: '<?= base_url('rooms/getAllRoom'); ?>',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          if (response.success === true) {
            $('#nameroom').html('<option value="" selected>- เลือกห้องประชุม -</option>');
            response.getRooms.forEach(function(room) {
              $('#nameroom').append('<option value="' + room.R_ID + '">' + room.R_NAME + '</option>');
            });
          } else {
            Swal.fire({
              title: "เกิดข้อผิดพลาด",
              text: response.message,
              icon: "error",
              confirmButtonText: "ลองอีกครั้ง",
            });
          }
        },
        error: function(xhr, status, error) {
          Swal.fire({
            title: "เกิดข้อผิดพลาด",
            text: error,
            icon: "error",
            confirmButtonText: "ลองอีกครั้ง",
          });
        }
      });
    } else {
      $('#nameroom').html('<option value="" selected>- เลือกห้องประชุม -</option>');
    }
  }

  $('#div-calendar-booking').hide();
  $('#nameroom').on('change', function() {
    if ($('#nameroom').val() != "") {
      var formData = new FormData();
      formData.append('r_id', $('#nameroom').val());

      $.ajax({
        url: '<?= base_url('rooms/getChair_Id'); ?>',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          if (response.success === true) {
            $('#chair').html('<option value="" selected>- เลือกจำนวนที่นั่ง -</option>');
            for (let i = 1; i <= response.getChair; i++) {
              $('#chair').append('<option value="' + i + '">' + i + '</option>');
            }

            $('#div-calendar-booking').show();
            var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
              initialDate: new Date().toISOString().split('T')[0],
              editable: false,
              selectable: true,
              businessHours: true,
              dayMaxEvents: true,
              events: function(fetchInfo, successCallback, failureCallback) {
                $.ajax({
                  url: '<?= base_url(); ?>booking/get_active_booking',
                  method: 'GET',
                  success: function(data) {
                    successCallback(parseEventData(data));
                  },
                  error: function() {
                    failureCallback();
                  }
                });
              },
              eventContent: function(arg) {
                var events = calendar.getEvents();
                var eventsWithSameTitle = events.filter(function(event) {
                  return event.start && arg.event.start && event.start.toDateString() === arg.event.start.toDateString() && event.title === arg.event.title;
                });

                var eventClass = ' fc-text-warning ';
                if (eventsWithSameTitle.length >= 2 || arg.event.extendedProps.time === "FULLDATE") {
                  eventClass = ' fc-text-danger ';
                }

                var eventHtml = '<div class="">';
                eventHtml += '<div class="fc-pd-default' + eventClass + '">' + arg.event.title + '</div>';
                eventHtml += '<div class="fc-event-time fc-pd-default">' + formatDate(arg.event.start, arg.event.extendedProps.time) + '</div>';
                eventHtml += '</div>';

                return {
                  html: eventHtml
                };
              },
              eventClick: function(info) {
                // console.log('Event clicked:', info.event);
              },
              select: function(info) {
                setDefaultDate(info.startStr);
              }
            });

            calendar.render();
          } else {
            Swal.fire({
              title: "เกิดข้อผิดพลาด",
              text: response.message,
              icon: "error",
              confirmButtonText: "ลองอีกครั้ง",
            });
          }
        },
        error: function(xhr, status, error) {
          Swal.fire({
            title: "เกิดข้อผิดพลาด",
            text: error,
            icon: "error",
            confirmButtonText: "ลองอีกครั้ง",
          });
        }
      });
    } else {
      $('#chair').html('<option value="" selected>- ไม่พบข้อมูลที่นั่ง -</option>');
      $('#div-calendar-booking').hide();
    }
  });


  setDefaultDate(new Date());

  function setDefaultDate(date) {
    if (date != "") {
      var formData = new FormData();
      formData.append('date', date);
      formData.append('r_id', $('#nameroom').val());

      $.ajax({
        url: '<?= base_url('booking/getTime_byDateRoom'); ?>',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          response = JSON.parse(response);
          if (response.success === true) {
            var bTimeData = response.data.map(function(item) {
              return item.B_TIME;
            });

            $('input[name="time"]').each(function() {
              if (bTimeData.includes($(this).val()) || bTimeData.includes("FULLDATE")) {
                $(this).prop('disabled', true);
                $(this).prop('checked', false);
                $('label[for="' + $(this).attr('id') + '"]').css('display', 'none');
              } else {
                $(this).prop('disabled', false);
                $(this).prop('checked', false);
                $('label[for="' + $(this).attr('id') + '"]').css('display', '');
              }
            });
            if (bTimeData.length >= 1) {
                $('option[id="option-3"]').prop('disabled', true);
                $('option[id="option-3"]').prop('checked', false);
                $('label[for="option-3"]').css('display', 'none');
              }
          } else {
            Swal.fire({
              title: "Oops...",
              text: response.message,
              icon: "error",
              confirmButtonText: "ลองอีกครั้ง",
            });
          }
        },
        error: function(xhr, status, error) {
          Swal.fire({
            title: "เกิดข้อผิดพลาด",
            text: error,
            icon: "error",
            confirmButtonText: "ลองอีกครั้ง",
          });
        }
      });

      var dateObj = new Date(date);
      var day = String(dateObj.getDate()).padStart(2, '0');
      var month = dateObj.getMonth() + 1;
      var year = dateObj.getFullYear() + 543;

      var thaiMonths = [
        "มกราคม",
        "กุมภาพันธ์",
        "มีนาคม",
        "เมษายน",
        "พฤษภาคม",
        "มิถุนายน",
        "กรกฎาคม",
        "สิงหาคม",
        "กันยายน",
        "ตุลาคม",
        "พฤศจิกายน",
        "ธันวาคม"
      ];

      var formattedDate = "วันที่ " + day + " " + thaiMonths[month - 1] + " " + year;
      $('#date_preview').html(formattedDate);
      $('#date').val(day + "-" + month + "-" + (year - 543));
    } else {
      $('#date_preview').html('');
      $('#date').val('');
    }
  }
</script>
<?= $this->endSection() ?>