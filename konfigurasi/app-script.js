const wbook = SpreadsheetApp.getActive();
const menuSheet = wbook.getSheetByName("Product");

function doGet(e) {
    // Memeriksa apakah sheet ada
    if (menuSheet != null) {
        let data = [];
        const rlen = menuSheet.getLastRow(); // Mengambil jumlah baris terakhir
        const clen = menuSheet.getLastColumn(); // Mengambil jumlah kolom terakhir
        const rows = menuSheet.getRange(1, 1, rlen, clen).getValues(); // Mengambil semua nilai dalam rentang

        // Mengiterasi setiap baris untuk membangun array data
        for (let i = 0; i < rows.length; i++) {
            const dataRow = rows[i];
            let record = {};
            for (let j = 0; j < clen; j++) {
                record[rows[0][j]] = dataRow[j];
            }
            if (i > 0) {
                data.push(record);
            }
        }

        // Mengambil parameter 'slug' dari URL jika ada
        const slug = e.parameter.slug;

        if (slug) {
            // Jika ada parameter 'slug', cari data dengan slug tersebut
            const foundData = data.find((item) => item.slug === slug);
            if (foundData) {
                // Jika data ditemukan, kembalikan data tersebut dalam format JSON
                return ContentService.createTextOutput(
                    JSON.stringify({
                        meta: {
                            success: true,
                            message: "Product detail",
                        },
                        data: foundData,
                    })
                ).setMimeType(ContentService.MimeType.JSON);
            } else {
                // Jika data tidak ditemukan, kembalikan pesan kesalahan
                return ContentService.createTextOutput(
                    JSON.stringify({
                        meta: {
                            success: false,
                            message: "Product not found",
                        },
                    })
                ).setMimeType(ContentService.MimeType.JSON);
            }
        } else {
            // Jika tidak ada parameter 'slug', kembalikan semua data dalam format JSON
            // Sort data by ID in descending order
            data.sort((a, b) => b.id - a.id);

            return ContentService.createTextOutput(
                JSON.stringify({
                    meta: {
                        success: true,
                        message: "List data product",
                    },
                    data: data,
                })
            ).setMimeType(ContentService.MimeType.JSON);
        }
    } else {
        // Jika sheet tidak ditemukan, mengembalikan pesan kesalahan
        return ContentService.createTextOutput(
            JSON.stringify({ error: "Sheet tidak ditemukan" })
        ).setMimeType(ContentService.MimeType.JSON);
    }
}
