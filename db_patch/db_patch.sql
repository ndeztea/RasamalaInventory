ALTER TABLE `hutang` ADD `keterangan` TEXT NOT NULL , ADD `jatuh_tempo` DATE NOT NULL ;
ALTER TABLE `hutang` CHANGE `tanggal_update` `tanggal_update` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
