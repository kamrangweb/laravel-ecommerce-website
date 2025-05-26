const { Client } = require('pg');

// PostgreSQL bağlantı bilgileri
const client = new Client({
    user: 'postgres',
    host: 'localhost',
    database: 'postgres',
    password: 'Kqa123!', // PostgreSQL kurulumunda belirlediğiniz şifre
    port: 5432,
});

async function testConnection() {
    try {
        console.log('PostgreSQL bağlantısı deneniyor...');
        await client.connect();
        console.log('Bağlantı başarılı!');
        
        // PostgreSQL versiyonunu kontrol et
        const result = await client.query('SELECT version()');
        console.log('PostgreSQL Versiyonu:', result.rows[0].version);
        
        // Bağlantıyı kapat
        await client.end();
    } catch (err) {
        console.error('Bağlantı hatası:', err);
    }
}

testConnection(); 