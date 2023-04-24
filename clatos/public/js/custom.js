function updateFlag(url, field, lead_id, value, _token) {

            var formData = {
                        lead_id: lead_id,
                        field: field,
                        value: value,
                        _token: _token,
            };

            var type = 'POST';
            $.ajax({
                        type: type,
                        url: url,
                        data: formData,
                        dataType: 'json',
                        success: function (data) {
                                    
                        },
                        error: function (data) {
                                    console.log(data);
                        }
            });
}