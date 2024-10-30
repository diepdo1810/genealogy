# Trợ giúp

<hr />

<!-- ---------------------------------------------------------------------------------- -->

## 1. Khái niệm: Mô hình & mối quan hệ

### a. Con người

<ul>
<li>Một người có thể có 1 người cha ruột (1 người, dựa trên <b>father_id</b>)</li>
<li>Một người có thể có 1 người mẹ ruột (1 người, dựa trên <b>mother_id</b>)</li>
<li>Một người có thể có 1 cặp cha mẹ, có thể là cha mẹ ruột hoặc không (1 cặp gồm 2 người, dựa trên <b>parents_id</b>)</li>
<li>Một người có thể có từ 0 đến nhiều con ruột (n người, dựa trên father_id/mother_id)</li>
<li>Một người có thể có từ 0 đến nhiều bạn tình (n người), là một phần của 0 đến nhiều cặp đôi (giới tính sinh học khác hoặc cùng giới tính)</li>
<li>Một người có thể là một phần của một cặp đôi với cùng một bạn tình nhiều lần (tái hôn hoặc đoàn tụ)</li>
</ul>

### b. Các cặp đôi

<ul>
<li>Một cặp đôi có thể có từ 0 đến nhiều con (dựa trên parents_id là một cặp đôi hoặc father_id/mother_id riêng lẻ)</li>
<li>Một cặp đôi có thể kết hôn hoặc không, vẫn ở bên nhau hoặc ly thân trong thời gian đó</li>
</ul>

<hr />

<!-- ---------------------------------------------------------------------------------- -->

## 2. Xác thực, đa thuê bao và khả năng truy cập dữ liệu

### a. Người dùng

<img src="img/help/genealogy-002aa.webp" class="rounded" alt="Menu">

Người dùng có thể tự <b>đăng ký</b>.<br/>
Cần có ít nhất <b>họ</b>, <b>địa chỉ email</b> hợp lệ, <b>ngôn ngữ</b>, <b>múi giờ</b> và <b>mật khẩu</b>.

<img src="img/help/genealogy-002bb.webp" class="rounded" alt="Đăng ký">

Sau khi đăng ký và xác minh email tùy chọn, người dùng có thể <b>đăng nhập</b>.<br/>

<img src="img/help/genealogy-002cc.webp" class="rounded" alt="Đăng nhập">

Người dùng đã xác thực, không có lời mời, theo mặc định thuộc về (và sở hữu) <b>nhóm cá nhân</b> của riêng họ.<br/>
Người dùng mới, sau khi chấp nhận lời mời qua email từ người dùng khác và đăng ký, theo mặc định sẽ được đăng nhập vào nhóm mà họ được mời. Những người dùng đó theo mặc định cũng có nhóm cá nhân của riêng họ theo ý của họ.

<img src="img/help/genealogy-002d.webp" class="rounded" alt="Nhóm">

<b>Xác thực hai yếu tố</b> (2FA) và <b>Xác minh email</b> có thể được bật và cấu hình trong <b>config/fortify.php</b>.

### b. Tài khoản người dùng và hồ sơ

Người dùng đã xác thực có thể quản lý tài khoản và hồ sơ người dùng của họ bằng cách sử dụng menu thả xuống ở góc trên bên phải của thanh menu.

<img src="img/help/genealogy-003a.webp" class="rounded" alt="Cài đặt hồ sơ">

<img src="img/help/genealogy-005aa.webp" class="rounded" alt="Hồ sơ người dùng">

### c. Nhóm

Người dùng đã xác thực có thể quản lý nhóm và cài đặt nhóm của họ bằng cách sử dụng menu thả xuống ở góc trên bên phải của thanh menu.

<img src="img/help/genealogy-004.webp" class="rounded" alt="Cài đặt nhóm">

Người dùng có thể quản lý nhóm cá nhân của mình hoặc tạo nhóm mới.<br/>
<span style="color:red">
Nhóm cá nhân và tất cả các nhóm do người dùng tạo cũng thuộc sở hữu của người dùng đó.<br/>
Chỉ chủ sở hữu mới có thể mời những người dùng khác (mới hoặc đã đăng ký) (qua email) tham gia nhóm do mình sở hữu.
</span>

<img src="img/help/genealogy-005b.webp" class="rounded" alt="Quản lý nhóm">

<span style="color:red">
Tạo một <b>nhóm mới và riêng biệt</b> cho mỗi <b>gia phả</b> mà bạn muốn quản lý và mời những người dùng khác vào nhóm đó</b>.<br/>
Bằng cách chỉ định cho người dùng <b>vai trò</b> phù hợp, bạn có thể xác định các quyền mà họ có trong nhóm đã chọn.
</span>

Người dùng đã xác thực chỉ có thể nhìn thấy <b>người</b> và <b>cặp đôi</b>:

<ul>
<li>do chính các nhóm mà họ <b>sở hữu</b> tạo ra</li>
<li>do chính các nhóm mà họ được <b>chủ nhóm</b> mời tham gia với tư cách là <b>quản trị viên</b>, <b>người quản lý</b>, <b>biên tập viên</b> hoặc <b>thành viên</b></li>
</ul>

### d. Vai trò & quyền

<table>
<thead>
<tr>
<th style="text-align:left">Vai trò</th>
<th style="text-align:left">Mô hình</th>
<th style="text-align:left">Quyền</th>
</tr>
</thead>
<tbody>
<tr>
<td rowspan="3"><b>Quản trị viên</b></td>
<td>người dùng</td>
<td>tạo, đọc, cập nhật, xóa</td>
</tr>
<tr>
<td>người</td>
<td>tạo, đọc, cập nhật, xóa</td>
</tr>
<tr>
<td>cặp đôi</td>
<td>tạo, đọc, cập nhật, xóa</td>
</tr>
<tr>
<td>cặp đôi</td>
<td>tạo, đọc, cập nhật, xóa</td>
</tr>
<tr>
<td rowspan="2"><b>Người quản lý</b></td>
<td>người</td>
<td>tạo, đọc, cập nhật, xóa</td>
</tr>
<tr>
<td>cặp đôi</td>
<td>tạo, đọc, cập nhật, xóa</td>
</tr>
<tr>
<td rowspan="2"><b>Biên tập viên</b></td>
<td>người</td>
<td>tạo, đọc, cập nhật</td>
</tr>
<tr>
<td>cặp đôi</td>
<td>tạo, đọc, cập nhật</td>
</tr>
<tr>
<td rowspan="2"><b>Thành viên</b></td>
<td>người</td>
<td>đọc</td>
</tr>
<tr>
<td>cặp đôi</td>
<td>đọc</td>
</tr>
</tbody>
</table>

<hr />

<!-- ---------------------------------------------------------------------------------- -->

## 3. Tìm kiếm

<img src="img/help/genealogy-001.webp" class="rounded" alt="Menu">

Sau khi đăng nhập và <span style="color:red">chọn đúng nhóm</span>, hãy nhấp vào nút <b>Tìm kiếm</b> trong menu điều hướng trên cùng.

<img src="img/help/genealogy-010a.webp" class="rounded" alt="Search">

Nhập giá trị tìm kiếm vào <b>hộp tìm kiếm</b>.<br/>
Phía trên hộp tìm kiếm, số lượng người có thể tìm thấy trong <b>nhóm hiện tại</b> sẽ được hiển thị.<br/>

<span class="text-red-500">
<u>Mẹo</u>:<br/>
<ol>
<li>Hệ thống sẽ tra cứu <b>từng từ</b> trong giá trị tìm kiếm trong các thuộc tính <b>họ</b>, <b>tên</b>, <b>tên khai sinh</b> và <b>biệt danh</b>.</li>
<li>
Bắt đầu chuỗi tìm kiếm bằng <b>%</b> nếu bạn muốn tìm kiếm một phần tên, ví dụ: <b>%Jr</b>.<br/> Lưu ý rằng các loại tìm kiếm này chậm hơn.
</li>
<li>
Nếu họ, tên, tên khai sinh hoặc biệt danh có bất kỳ khoảng trắng nào, hãy đặt tên trong dấu ngoặc kép, ví dụ: <b>"John Jr."</b> Kennedy.<br/>
</li>
</ol>
</span>

Kết quả được hiển thị trong lưới bên dưới hộp tìm kiếm, mỗi người được biểu diễn trong một thẻ.<br/>
Bạn có thể sử dụng các nút phân trang để điều hướng. Bạn cũng có thể thay đổi số lượng người được hiển thị trên mỗi trang.

<img src="img/help/genealogy-012.webp" class="rounded" alt="Menu">

Nhấp vào nút <b>Hồ sơ</b> hoặc <b>Biểu đồ gia đình</b> để xem thông tin chi tiết về người đó.<br/>
Nhấp vào tên của cha hoặc mẹ để truy cập vào cha mẹ.

<hr />

<!-- ---------------------------------------------------------------------------------- -->

## 4. Thêm người

### a. Người mới

Sau khi đăng nhập và <span style="color:red">chọn đúng nhóm</span>, hãy nhấp vào nút <b>Tìm kiếm</b> trong menu điều hướng trên cùng.

<img src="img/help/genealogy-001.webp" class="rounded" alt="Tìm kiếm">

Bạn có thể thêm người mới bằng cách nhấp vào nút <b>Thêm người</b> phía trên thanh tìm kiếm.

<img src="img/help/genealogy-010a.webp" class="rounded" alt="Thêm người">
<img src="img/help/genealogy-011.webp" class="rounded" alt="Thêm người">

### b. Người mới là cha hoặc mẹ

Một cách khác để thêm người là nhấp vào tab <b>Thêm cha</b> hoặc <b>Thêm mẹ</b> trong menu ngữ cảnh <b>Gia đình</b> của một người hiện có.<br/>
Các tùy chọn này chỉ khả dụng nếu người hiện có chưa có cha hoặc mẹ.

<img src="img/help/genealogy-033a.webp" class="rounded" alt="Đối tác">
<img src="img/help/genealogy-035.webp" class="rounded" alt="Thêm cha">
<img src="img/help/genealogy-036.webp" class="rounded" alt="Thêm mẹ">

<div style="color:red">
Bạn có thể tạo một <b>người hoàn toàn mới</b> hoặc chọn một <b>người hiện có</b> làm cha hoặc mẹ mới của người đó.
</div>

### c. Người mới là đối tác

Một cách khác để thêm người là nhấp vào tab <b>Thêm mối quan hệ</b> trong menu ngữ cảnh <b>Đối tác</b> của một người hiện có.

<img src="img/help/genealogy-055.webp" class="rounded" alt="Đối tác">
<img src="img/help/genealogy-056a.webp" class="rounded" alt="Thêm mối quan hệ">

<div style="color:red">
Bạn có thể tạo một <b>người hoàn toàn mới</b> hoặc chọn một <b>người hiện có</b> làm đối tác mới của người đó.
</div>

### d. Người mới là trẻ em

Cách cuối cùng để thêm người là nhấp vào tab <b>Thêm trẻ em</b> trong menu ngữ cảnh <b>Trẻ em</b> của một người hiện có.

<img src="img/help/genealogy-050.webp" class="rounded" alt="Con cái">
<img src="img/help/genealogy-051.webp" class="rounded" alt="Thêm con">

<div style="color:red">
Bạn có thể tạo một <b>người hoàn toàn mới</b> hoặc chọn một <b>người hiện tại</b> làm con mới của người đó.
</div>

<hr />

<!-- ---------------------------------------------------------------------------------- -->

## 5. Cá nhân và mối quan hệ

### a. Hồ sơ

Tổng quan cá nhân hiển thị tất cả thông tin về người được chọn.

<img src="img/help/genealogy-020a.webp" class="rounded" alt="Tổng quan về cá nhân">

Thanh điều hướng ở trên cùng cho phép bạn chọn một số mục cụ thể.

<img src="img/help/genealogy-021.webp" class="rounded" alt="Menu cá nhân">

Thẻ <b>Hồ sơ</b> hiển thị tất cả thông tin chung về cá nhân.

<img src="img/help/genealogy-022a.webp" class="rounded" alt="Hồ sơ đã khuất">

Lưu ý rằng thẻ này hiển thị dữ liệu khác nhau cho người <b>còn sống</b> và người <b>đã khuất</b>.

<img src="img/help/genealogy-022b.webp" class="rounded" alt="Hồ sơ còn sống">

Bạn có thể chỉnh sửa dữ liệu <b>hồ sơ</b>, <b>liên hệ</b> và <b>tử vong</b> bằng cách chọn tab tương ứng trong menu ngữ cảnh.

<img src="img/help/genealogy-023a.webp" class="rounded" alt="Chỉnh sửa hồ sơ">
<img src="img/help/genealogy-024.webp" class="rounded" alt="Chỉnh sửa hồ sơ">
<img src="img/help/genealogy-025a.webp" class="rounded" alt="Chỉnh sửa hồ sơ liên hệ">
<img src="img/help/genealogy-026a.webp" class="rounded" alt="Chỉnh sửa hồ sơ tử vong">

### b. Ảnh

<img src="img/help/genealogy-022c.webp" class="rounded" alt="Chỉnh sửa ảnh">

Bạn có thể duyệt qua các ảnh có sẵn bằng cách sử dụng thanh điều hướng phía trên băng chuyền ảnh.<br/>
Bạn có thể quản lý ảnh bằng cách chọn tab tương ứng trong menu ngữ cảnh.

<img src="img/help/genealogy-023a.webp" class="rounded" alt="Chỉnh sửa hồ sơ">
<img src="img/help/genealogy-027.webp" class="rounded" alt="Thêm ảnh">

Bạn có thể <b>tải lên</b> (nhiều) ảnh mới.<br/>
Bạn có thể <b>tải xuống</b> hoặc <b>xóa</b> các ảnh hiện có.<br/>
Sau khi xóa ảnh chính, ảnh đầu tiên trong bộ sưu tập sẽ trở thành ảnh chính mới.<br/>
Bạn cũng có thể đặt ảnh chính bằng cách nhấp vào nút <b>Sao</b>.

### c. Gia đình

Thẻ <b>Gia đình</b> hiển thị cha mẹ của người đó và đối tác hiện tại.

<img src="img/help/genealogy-033.webp" class="rounded" alt="Gia đình">

<b>Cha</b> và <b>Mẹ</b> luôn ám chỉ đến cha và mẹ <b>sinh học</b>.<br/>
Cha mẹ không phải sinh học có thể được định nghĩa bằng liên kết <b>Cha mẹ</b>.

Bạn có thể chỉnh sửa dữ liệu gia đình bằng cách chọn tùy chọn <b>Chỉnh sửa</b> trong menu ngữ cảnh gia đình.<br/>
Trong trường hợp cha hoặc mẹ của người đó chưa được biết, bạn có thể thêm hoặc chỉnh sửa trực tiếp trong menu ngữ cảnh gia đình.

<img src="img/help/genealogy-033a.webp" class="rounded" alt="Sửa gia đình">
<img src="img/help/genealogy-034.webp" class="rounded" alt="Gia đình">

### d. Đối tác (Cặp đôi)

<img src="img/help/genealogy-040a.webp" class="rounded" alt="Đối tác">

Bạn có thể <b>thêm</b>, <b>chỉnh sửa</b> hoặc <b>xóa</b> một mối quan hệ bằng cách chọn tab tương ứng trong menu ngữ cảnh.
Khi xóa một mối quan hệ, đối tác cũ vẫn ở trong bộ sưu tập như một người riêng biệt.
Trong những trường hợp bình thường, bạn chỉ nên xóa các mối quan hệ khi nhập nhầm.
Bạn có thể kết thúc mọi mối quan hệ đã thoát bằng cách đặt mối quan hệ là đã kết thúc, có hoặc không chỉ định ngày kết thúc.

<img src="img/help/genealogy-041b.webp" class="rounded" alt="Thêm đối tác">

<div style="color:red">
Khi thêm đối tác, bạn có thể tạo một người hoàn toàn mới hoặc chọn một người hiện tại làm đối tác mới.
</div>

<img src="img/help/genealogy-055.webp" class="rounded" alt="Thêm đối tác">
<img src="img/help/genealogy-042a.webp" class="rounded" alt="Chỉnh sửa đối tác">

### e. Con cái

<img src="img/help/genealogy-050.webp" class="rounded" alt="Con cái">

Bạn có thể <b>thêm</b> một đứa con hoặc <b>ngắt kết nối</b> những đứa con hiện tại bằng cách chọn tab tương ứng trong menu ngữ cảnh.
Đứa con bị ngắt kết nối sẽ vẫn nằm trong cơ sở dữ liệu dưới dạng một người nhưng không còn người được chọn làm cha hoặc mẹ nữa.

<img src="img/help/genealogy-051.webp" class="rounded" alt="Child add">

<div style="color:red">
Khi thêm một đứa trẻ, bạn có thể tạo một <b>người hoàn toàn mới</b> hoặc chọn một <b>người hiện có</b>.
</div>

### f. Anh chị em ruột

Anh chị em ruột được hiển thị trên thẻ anh chị em ruột.<br/>

<img src="img/help/genealogy-060a.webp" class="rounded" alt="Anh chị em ruột">

Một anh chị em ruột có thể là <b>đầy đủ</b>: cả hai đều là cha mẹ ruột giống như người được chọn.<br/>
Một anh chị em ruột có thể là <b>một nửa</b>: chỉ có mẹ ruột hoặc cha ruột là chung. <span class="text-warning-500">[1/2]</span><br/>
Một anh chị em ruột có thể là <b>cộng</b>: cả cha ruột và mẹ ruột đều không phải là chung, nhưng đứa trẻ là một phần trong mối quan hệ hiện tại của người được chọn <span class="text-warning-500">[+]</span>

### g. Tổ tiên

Điều này hiển thị tổ tiên của người được chọn.<br/>
Bạn có thể thay đổi độ sâu của cây bằng cách sử dụng điều khiển trong tiêu đề thẻ Tổ tiên.

<img src="img/help/genealogy-070.webp" class="rounded" alt="Tổ tiên">

### h. Hậu duệ

Điều này hiển thị hậu duệ của người được chọn.<br/>
Bạn có thể thay đổi độ sâu của cây bằng cách sử dụng điều khiển trong tiêu đề thẻ Hậu duệ.

<img src="img/help/genealogy-071.webp" class="rounded" alt="Descendants">

### i. Biểu đồ gia đình

Điều này hiển thị biểu đồ gia đình đầy đủ, sâu 3 thế hệ.<br/>
Nhấp vào tên thành viên gia đình để xem biểu đồ gia đình của người đó.

<img src="img/help/genealogy-072.webp" class="rounded" alt="Biểu đồ gia đình">

### j. Tệp

Điều này hiển thị các tệp được đính kèm vào người đó.<br/>
Bạn có thể sử dụng tính năng này để đính kèm tài liệu.

<img src="img/help/genealogy-074.webp" class="rounded" alt="Files">

Bạn có thể tải lên (nhiều) tài liệu mới.<br/>
Bạn có thể chỉ định nguồn của các tài liệu bạn muốn tải lên.<br/>
Bạn có thể sắp xếp lại thứ tự của các tài liệu bằng cách nhấp vào nút <b>Lên</b> hoặc <b>Xuống</b>.<br/>
Bạn có thể tải xuống các tài liệu bằng cách nhấp vào nút <b>Tải xuống</b> hoặc mở chúng trong một cửa sổ riêng biệt bằng cách nhấp vào biểu tượng tài liệu.<br/>
Bạn có thể xóa một tài liệu bằng cách nhấp vào nút <b>Xóa</b>.

### k. Lịch sử

Điều này hiển thị lịch sử của người được chọn.<br/>

<img src="img/help/genealogy-073a.webp" class="rounded" alt="Lịch sử">

<hr />

<!-- -------------------------------------------------------------------------------------------------- -->

## 6. Sinh nhật

Sau khi đăng nhập và chọn đúng nhóm, hãy nhấp vào nút <b>Sinh nhật</b> trong menu điều hướng trên cùng.

<img src="img/help/genealogy-001.webp" class="rounded" alt="Menu">

Điều này hiển thị các sinh nhật sắp tới.

<img src="img/help/genealogy-080.webp" class="rounded" alt="Sinh nhật">

<hr />

<!-- ---------------------------------------------------------------------------------- -->

## 7. Menu Offcanvas

Người dùng có thể nhấp vào nút ở menu trên cùng bên phải để mở <b>menu offcanvas</b>.<br/>
Ở trên cùng, vai trò và quyền của người dùng trong nhóm hiện tại được hiển thị.<br/>
Nếu người dùng có quyền phù hợp, các tính năng bổ sung sẽ được hiển thị.

<img src="img/help/genealogy-006a.webp" class="rounded" alt="Offcanvas menu">

### a. Nhóm & mọi người

Menu offcanvas cho phép <b>các nhà phát triển</b> tham khảo tất cả các nhóm và mọi người.

<img src="img/help/genealogy-090a.webp" class="rounded" alt="Nhóm">
<img src="img/help/genealogy-090b.webp" class="rounded" alt="Mọi người">

### b. Người dùng & ghi nhật ký

Menu offcanvas cho phép <b>các nhà phát triển</b> tham khảo người dùng và thông tin ghi nhật ký của họ.

<img src="img/help/genealogy-091.webp" class="rounded" alt="Người dùng">
<img src="img/help/genealogy-093.webp" class="rounded" alt="Người dùng ghi nhật ký 1">
<img src="img/help/genealogy-094.webp" class="rounded" alt="Người dùng ghi nhật ký 2">

### c. Sao lưu

Mục menu <b>Sao lưu</b> cho phép <b>nhà phát triển</b> quản lý các bản sao lưu cơ sở dữ liệu.

<img src="img/help/genealogy-095.webp" class="rounded" alt="Sao lưu">

### d. Trình xem nhật ký

Mục menu <b>Trình xem nhật ký</b> cho phép <b>nhà phát triển</b> tham khảo các tệp nhật ký ứng dụng.

<img src="img/help/genealogy-096a.webp" class="rounded" alt="Trình xem nhật ký">

### e. Dependencies

Mục menu <b>Dependencies</b> cho phép <b>các nhà phát triển</b> tham khảo các dependency của ứng dụng.

<img src="img/help/genealogy-097.webp" class="rounded" alt="Dependencies">

### f. Session

Mục menu <b>Session</b> cho phép <b>các nhà phát triển</b> tham khảo phiên ứng dụng.

<img src="img/help/genealogy-098.webp" class="rounded" alt="Session">

<hr />

<!-- -------------------------------------------------------------------------------------------------- -->

## 8. Ngôn ngữ & Múi giờ

### a. Khách truy cập

Khách truy cập có thể thay đổi ngôn ngữ trong menu trên cùng bên phải bằng cách sử dụng <b>trình chọn ngôn ngữ</b>.<br/>
Ngôn ngữ mặc định của ứng dụng là <b>Tiếng Anh</b>.

<img src="img/help/genealogy-002aa.webp" class="rounded" alt="Menu ngôn ngữ">

### b. Người dùng đã xác thực

Người dùng đã xác thực có thể thay đổi ngôn ngữ và múi giờ trong menu trên cùng bên phải bằng cách sử dụng <b>trình chỉnh sửa hồ sơ</b>.<br/>
Ngôn ngữ và múi giờ đã chọn được lưu trong cơ sở dữ liệu.

<img src="img/help/genealogy-002d.webp" class="rounded" alt="Trình chỉnh sửa hồ sơ">

<hr />

<!-- ---------------------------------------------------------------------------------- -->

## 9. Chủ đề màu

Người dùng có thể thay đổi chủ đề màu trong menu trên cùng bên phải bằng cách sử dụng <b>biểu tượng chủ đề</b>.<br/>
Chủ đề ứng dụng <b>mặc định</b> là <b>Chế độ tối</b>.

<img src="img/help/genealogy-002aa.webp" class="rounded" alt="Bộ chọn chủ đề">
