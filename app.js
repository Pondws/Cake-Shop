let el = document.getElementById("wrapper");
let btnToggle = document.getElementById("menu-toggle");

btnToggle.onclick = () => {
    el.classList.toggle("toggled");
};

const logout = () => {
    Swal.fire({
        title: 'ยืนยันการออกจากระบบ',
        text: 'คุณต้องการออกจากระบบใช่หรือไม่?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่, ออกจากระบบ',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'logout.php';
        }
    });
};

// const deleteuser = (id) => {
//     console.log(id);
//     Swal.fire({
//         title: 'ยืนยันการลบข้อมูลลูกค้า',
//         text: 'คุณต้องการลบข้อมูลลูกค้าใช่หรือไม่?',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'ใช่',
//         cancelButtonText: 'ยกเลิก'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             window.location.href = 'deleteuser.php?id=' + id;
//         }
//     });
// };




