const MIN_LOADING_TIME = 500; // 最低表示時間(ms)

/**
 * 共通 API 呼び出し関数（最低表示時間対応）
 */
function apiRequest(url, method = "GET", data = {}, onSuccess = null, onError = null) {
    const startTime = showLoading(); // ローディング表示と開始時間取得

    $.ajax({
        url: url,
        type: method,
        data: JSON.stringify(data),
        contentType: "application/json",
        dataType: "json",
        success: function (response) {
            if (response.success) {
                if (onSuccess) onSuccess(response.data, response.message, response.meta);
            } else {
                if (onError) {
                    onError(response.errors, response.message, response.meta);
                } else {
                    alert("エラー: " + response.message);
                }
            }
        },
        error: function (xhr) {
            if (onError) {
                onError([{ code: xhr.status, message: xhr.statusText }], "通信エラー", {});
            } else {
                alert("通信エラー: " + xhr.status);
            }
        },
        complete: function () {
            hideLoadingWithMinTime(startTime); // 最低表示時間を考慮して非表示
        }
    });
}

/**
 * ローディング
 */
function showLoading() {
    $('#loadingOverlay').addClass('active');
    $('body').css('overflow', 'hidden');
    return Date.now(); // 表示開始時間
}
function hideLoadingWithMinTime(startTime) {
    const elapsed = Date.now() - startTime;
    const remaining = MIN_LOADING_TIME - elapsed;

    if (remaining > 0) {
        setTimeout(() => {
            $('#loadingOverlay').removeClass('active');
            $('body').css('overflow', '');
        }, remaining);
    } else {
        $('#loadingOverlay').removeClass('active');
        $('body').css('overflow', '');
    }
}

/**
 * フォーム送信を共通化
 */
$(function () {
    $(document).on("submit", ".api-action", function (e) {
        e.preventDefault();

        // フォームデータ
        const $form = $(this);
        const url = $form.attr("action");
        const method = $form.attr("method") || "POST";
        const formDataArray = $form.serializeArray();
        const formData = {};
        formDataArray.forEach(item => {
            formData[item.name] = item.value;
        });

        // 共通API呼び出し
        apiRequest(url, method, formData, function (data, message) {
            console.log("成功:", data, message);
        }, function (errors, message) {
            console.error("失敗:", errors, message);
        });
    });
});

/**
 * パスワードを見る
 */
$(function () {
    $('#togglePassword').on('click', function () {
        const $input = $('#password');
        const type = $input.attr('type') === 'password' ? 'text' : 'password';
        $input.attr('type', type);
    });
});

/**
 * ハンバーガーメニュー
 */
$(function () {
    const btn = document.querySelector('#hamburger')
    btn.addEventListener('click', () => {
        btn.classList.toggle('open')
    })
});