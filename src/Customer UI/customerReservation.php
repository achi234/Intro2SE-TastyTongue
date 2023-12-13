<?php 
session_start();

?>

<div class="container-fluid">
    <form action="" id="reservation-form">
        <div class="form-group">
            <label for="customer_name" class="control-label">Fullname</label>
            <input type="text" name="customer_name" autofocus id="customer_name" required class="form-control form-control-sm rounded-0" value="<?php echo isset($customer_name) ? $customer_name : '' ?>">
        </div>
        <div class="form-group">
            <label for="contact" class="control-label">Contact</label>
            <input type="text" name="contact" autofocus id="contact" required class="form-control form-control-sm rounded-0" value="<?php echo isset($contact) ? $contact : '' ?>">
        </div>
        <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input type="email" name="email" autofocus id="email" required class="form-control form-control-sm rounded-0" value="<?php echo isset($email) ? $email : '' ?>">
        </div>
        <div class="form-group">
            <label for="datetime" class="control-label">Reservation Date and Time</label>
            <input type="datetime-local" name="datetime" autofocus id="datetime" required class="form-control form-control-sm rounded-0" value="<?php echo isset($datetime) ? $datetime : '' ?>">
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary" id="submitDate">Submit Date</button>
        </div>
    </form>
    <div id="available-tables"></div>
    <button type="button" class="btn btn-success" id="reserveTable">Đặt Bàn</button>

    <!-- Thêm một thẻ div để hiển thị thông báo đặt bàn -->
    <div id="reservation-status"></div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function parseFormData(formData) {
            var result = {};
            var dataArray = formData.split('&');

            dataArray.forEach(function (pair) {
                var keyValue = pair.split('=');
                var key = decodeURIComponent(keyValue[0]);
                var value = decodeURIComponent(keyValue[1]);

                result[key] = value;
            });

            return result;
        }
        $(document).ready(function () {
            $('#submitDate').on('click', function () {
                // Lấy thông tin từ form
                var table_id = 0;
                var formData = $('#reservation-form').serialize();
                formData += '&table_id=' + encodeURIComponent(table_id);
                // Gửi yêu cầu Ajax đến reservation.php
                $.ajax({
                    type: 'POST',
                    url: '../Controller/customerController/reservation.php', // Đường dẫn đến file xử lý đặt bàn trên máy chủ
                    data: formData,
                  
                    success: function (response) {
                        // Hiển thị danh sách bàn khả dụng
                        $('#available-tables').html(response);
                        console.log(response);
                    },
                    error: function (xhr, status, error) {
                        // Xử lý lỗi ở đây
                        console.log('Ajax request failed. Status: ' + status + ', Error: ' + error);

                        // Hiển thị thông báo hoặc thực hiện các hành động khác khi có lỗi
                        alert('There was an error processing your request.');
                    }
                });
            });
        });
    </script>
    <script>
    $(document).ready(function () {
        // Xử lý sự kiện khi nhấn nút "Đặt bàn"
        $('#reserveTable').on('click', function () {
            // Lấy giá trị của bàn đã chọn
            var selectedTable = $('input[name="selected_table"]:checked').val();
            var formData = $('#reservation-form').serialize();
            formData += '&table_id=' + encodeURIComponent(selectedTable);
            if (selectedTable) {
                // Gửi yêu cầu Ajax để đặt bàn
                $.ajax({
                    type: 'POST',
                    url: '../Controller/customerController/reservation.php', // Đường dẫn đến file xử lý đặt bàn trên máy chủ
                    data: formData,
                     // Truyền thông tin bàn đã chọn
                    success: function (response) {
                        // Hiển thị thông báo kết quả đặt bàn
                        $('#reservation-status').html(response);
                    },
                    error: function (xhr, status, error) {
                        // Xử lý lỗi khi có lỗi đặt bàn
                        console.log('Error during reservation. Status: ' + status + ', Error: ' + error);
                        $('#reservation-status').html('There was an error during reservation.');
                    }
                });
            } else {
                // Hiển thị thông báo nếu người dùng chưa chọn bàn
                $('#reservation-status').html('Please select a table before reserving.');
            }
        });
    });
</script>
</div>

