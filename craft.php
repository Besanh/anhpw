switch (data.class_name) {
            case ('App\Models\Subscriber'):
                newNotificationHtml += `<div class = "icon-circle bg-primary" >
                    <i class = "fas fa-user-plus text-white" > < /i>
                        </div>`;
                break;
            case ('App\Models\Bill'):
                newNotificationHtml += `<div class="icon-circle bg-danger">
                    <i class="fas fa-donate text-white"></i>
                    </div>`;
                break;
            case ('App\Models\Contact'):
                newNotificationHtml += `<div class="icon-circle bg-success text-white">
                    <i class="fa fa-info-circle"></i>
                    </div>`;
                break;
        }