# Backup Automático

> O backup automático tem o intuito de ajudar aqueles que precisam fazer o backup de semanalmente, colocando uma rotina de backup para executar automaticamente pelo o Windows. O backup automático tem a possibilidade de fazer backup do banco MySQL e PostgreSQL atualmente!

## Como Usar?

> Para usar o backup automático, você deverá alterar as informações do arquivo 'config.php', e depois executar o CMD como Administrador e ir até a pasta do backup automático e executar o arquivo 'backup.bat', pronto o backup será feito. Caso queira criar uma tarefa do windows para o backup ser feito sozinho! Você pode configurar o mesmo arquivo de configuração e no agendamento de tarefas, linkar o arquivo 'backup.bat' no agendamento de tarefas e deixar que o windows irá fazer o resto! Caso queira fazer backup do 'PostgreSQL', abra o arquivo 'backup.bat' e retire a palavra 'REM' do comando 'SET PGPASSWORD=' e coloque a senha do seu banco 'PostgreSQL'!
