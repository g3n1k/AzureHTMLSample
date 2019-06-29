create table azuredb.dbo.['warga'] (
	id int NOT NULL IDENTITY(1,1) PRIMARY KEY,
	nama varchar(100) Not Null,
	nik varchar(100) Null,
	alamat varchar(300) Null,
	no_prop varchar(32) Null,
	no_kab varchar (32) Null,
	email varchar(64) Not Null,
	phone varchar(16) Not Null
) GO

