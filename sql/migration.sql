

CREATE TABLE migration (
    version character varying(180) NOT NULL,
    apply_time integer
);



INSERT INTO migration VALUES ('m000000_000000_base', 1450628874);
INSERT INTO migration VALUES ('m140209_132017_init', 1450628883);
INSERT INTO migration VALUES ('m140403_174025_create_account_table', 1450628883);
INSERT INTO migration VALUES ('m140504_113157_update_tables', 1450628883);
INSERT INTO migration VALUES ('m140504_130429_create_token_table', 1450628883);
INSERT INTO migration VALUES ('m140830_171933_fix_ip_field', 1450628884);
INSERT INTO migration VALUES ('m140830_172703_change_account_table_name', 1450628884);
INSERT INTO migration VALUES ('m141222_110026_update_ip_field', 1450628884);
INSERT INTO migration VALUES ('m141222_135246_alter_username_length', 1450628884);
INSERT INTO migration VALUES ('m150614_103145_update_social_account_table', 1450628884);
INSERT INTO migration VALUES ('m140506_102106_rbac_init', 1450632699);



ALTER TABLE ONLY migration
    ADD CONSTRAINT migration_pkey PRIMARY KEY (version);


--
-- PostgreSQL database dump complete
--

