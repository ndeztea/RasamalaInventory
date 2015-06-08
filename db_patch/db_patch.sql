ALTER TABLE `hutang` ADD `keterangan` TEXT NOT NULL , ADD `jatuh_tempo` DATE NOT NULL ;
ALTER TABLE `hutang` CHANGE `tanggal_update` `tanggal_update` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `piutang` ADD `keterangan` TEXT NOT NULL AFTER `id`, ADD `jatuh_tempo` DATE NOT NULL AFTER `keterangan`;
ALTER TABLE `barang_beli_detail` CHANGE `id_satuan` `id_satuan` VARCHAR(100) NOT NULL;
ALTER TABLE `barang_beli` CHANGE `kode_beli` `kode_beli` VARCHAR(50) NOT NULL;
ALTER TABLE `barang_beli` CHANGE `tanggal_update` `tanggal_update` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `barang_beli` ADD `id_user` INT NOT NULL ;


ALTER TABLE `barang_stock` ADD `harga_beli` FLOAT NOT NULL AFTER `id_satuan`, ADD `harga_jual` FLOAT NOT NULL AFTER `harga_beli`;

ALTER TABLE `barang_jual` ADD `total_bayar` FLOAT NOT NULL AFTER `total`, ADD `total_sisa` FLOAT NOT NULL AFTER `total_bayar`
ALTER TABLE `barang_beli` ADD `total_bayar` FLOAT NOT NULL AFTER `total`, ADD `total_sisa` FLOAT NOT NULL AFTER `total_bayar`

ALTER TABLE `hutang` ADD `id_barang_beli` INT NULL DEFAULT NULL AFTER `id`;

ALTER TABLE `piutang` ADD `id_barang_jual` INT NULL DEFAULT NULL AFTER `id`;
